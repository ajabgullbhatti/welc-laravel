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

    if (name.length < 2 || name.length > 100) {
      return json(res, 422, { error: 'Enter a name between 2 and 100 characters.' });
    }

    if (!EMAIL_PATTERN.test(email) || email.length > 320) {
      return json(res, 422, { error: 'Enter a valid email address.' });
    }

    if (password.length < 8 || password.length > 128) {
      return json(res, 422, { error: 'Password must be between 8 and 128 characters.' });
    }

    const existingUser = await prisma.user.findUnique({ where: { email } });
    if (existingUser) {
      return json(res, 409, { error: 'An account with this email already exists.' });
    }

    const passwordHash = await bcrypt.hash(password, 12);
    const user = await prisma.user.create({
      data: { name, email, passwordHash },
    });

    const session = await createSession(user.id);
    res.setHeader('Set-Cookie', sessionCookie(session.token, session.expiresAt));
    return json(res, 201, { user: publicUser(user) });
  } catch (error) {
    console.error('Registration failed:', error);
    return json(res, error.statusCode || 500, {
      error: error.statusCode ? error.message : 'Unable to create your account right now.',
    });
  }
};
