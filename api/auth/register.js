const bcrypt = require('bcryptjs');
const { prisma } = require('../../lib/prisma');
const { createSession, publicUser, sessionCookie } = require('../../lib/auth');
const { json, readJson, requireMethod, requireSameOrigin } = require('../../lib/http');

const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

module.exports = async function register(req, res) {
  if (!requireMethod(req, res, 'POST') || !requireSameOrigin(req, res)) return;

  try {
    const body = await readJson(req);
    const name = String(body.name || '').trim().replace(/\s+/g, ' ');
    const email = String(body.email || '').trim().toLowerCase();
    const password = String(body.password || '');
    const passwordConfirmation = String(body.password_confirmation || '');

    if (name.length < 2 || name.length > 100) {
      return json(res, 422, { error: 'Enter a name between 2 and 100 characters.' });
    }

    if (!EMAIL_PATTERN.test(email) || email.length > 320) {
      return json(res, 422, { error: 'Enter a valid email address.' });
    }

    if (password.length < 8 || password.length > 128) {
      return json(res, 422, { error: 'Password must be between 8 and 128 characters.' });
    }

    if (password !== passwordConfirmation) {
      return json(res, 422, { error: 'The password confirmation does not match.' });
    }

    const passwordHash = await bcrypt.hash(password, 12);
    const result = await prisma.$transaction(async (database) => {
      const existingUser = await database.user.findUnique({ where: { email } });
      if (existingUser) {
        const conflict = new Error('An account with this email already exists.');
        conflict.statusCode = 409;
        throw conflict;
      }

      const user = await database.user.create({
        data: { name, email, passwordHash },
      });
      const session = await createSession(user.id, database);

      return { user, session };
    });

    res.setHeader('Set-Cookie', sessionCookie(result.session.token, result.session.expiresAt));
    return json(res, 201, { user: publicUser(result.user) });
  } catch (error) {
    console.error('Registration failed:', error);
    const duplicateEmail = error.code === 'P2002';
    const statusCode = duplicateEmail ? 409 : (error.statusCode || 500);
    const message = duplicateEmail
      ? 'An account with this email already exists.'
      : (error.statusCode ? error.message : 'Unable to create your account right now.');
    return json(res, statusCode, { error: message });
  }
};
