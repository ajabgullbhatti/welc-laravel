const bcrypt = require('bcryptjs');
const { prisma } = require('../../lib/prisma');
const { createSession, publicUser, sessionCookie } = require('../../lib/auth');
const { json, readJson, requireMethod, requireSameOrigin } = require('../../lib/http');

const DUMMY_PASSWORD_HASH = '$2b$12$KIXQ4yix4bS.RM3U6SoOweJ5Qszp7ZtG1Qhvj6VQjDrV3G6Q0Kq9W';

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
    const validPassword = await bcrypt.compare(password, user?.passwordHash || DUMMY_PASSWORD_HASH);

    if (!user || !validPassword) {
      return json(res, 401, { error: 'The email or password is incorrect.' });
    }

    const session = await prisma.$transaction(async (database) => {
      await database.session.deleteMany({
        where: {
          userId: user.id,
          expiresAt: { lte: new Date() },
        },
      });
      return createSession(user.id, database);
    });
    res.setHeader('Set-Cookie', sessionCookie(session.token, session.expiresAt));
    return json(res, 200, { user: publicUser(user) });
  } catch (error) {
    console.error('Login failed:', error);
    return json(res, error.statusCode || 500, {
      error: error.statusCode ? error.message : 'Unable to sign in right now.',
    });
  }
};
