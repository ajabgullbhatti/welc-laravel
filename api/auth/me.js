const { getSession, publicUser } = require('../../lib/auth');
const { json, requireMethod } = require('../../lib/http');

module.exports = async function me(req, res) {
  if (!requireMethod(req, res, 'GET')) return;

  try {
    const session = await getSession(req);
    if (!session) {
      return json(res, 401, { error: 'You are not signed in.' });
    }

    return json(res, 200, { user: publicUser(session.user) });
  } catch (error) {
    console.error('Session lookup failed:', error);
    return json(res, 500, { error: 'Unable to load your account right now.' });
  }
};
