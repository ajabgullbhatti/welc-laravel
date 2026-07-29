const bcrypt = require('bcryptjs');
const { prisma } = require('../../lib/prisma');
const { createSession, publicUser, sessionCookie } = require('../../lib/auth');
const { json, readJson, requireMethod, requireSameOrigin } = require('../../lib/http');

module.exports = async function login(req, res) {
  if (!requireMethod(req, res, 'POST') || !requireSameOrigin(req, res)) return;

  try {
    const body = await readJson(req);
    const email = String(body.email || '').trim().toLowerCase();
    const password = String(body.password || '');

    if (!email || !password) {
      return json(res, 422, { error: 'Enter your email and password.' });
    }

    const user = await prisma.user.findUnique({ where: { email } });
    const validPassword = user ? await bcrypt.compare(password, user.passwordHash) : false;

    if (!user || !validPassword) {
      return json(res, 401, { error: 'The email or password is incorrect.' });
    }

    const session = await createSession(user.id);
    res.setHeader('Set-Cookie', sessionCookie(session.token, session.expiresAt));
    return json(res, 200, { user: publicUser(user) });
  } catch (error) {
    console.error('Login failed:', error);
    return json(res, 500, { error: 'Unable to sign in right now.' });
  }
};
