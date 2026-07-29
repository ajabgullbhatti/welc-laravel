const { clearedSessionCookie, deleteSession } = require('../../lib/auth');
const { json, requireMethod, requireSameOrigin } = require('../../lib/http');

module.exports = async function logout(req, res) {
  if (!requireMethod(req, res, 'POST') || !requireSameOrigin(req, res)) return;

  try {
    await deleteSession(req);
    res.setHeader('Set-Cookie', clearedSessionCookie());
    return json(res, 200, { success: true });
  } catch (error) {
    console.error('Logout failed:', error);
    return json(res, 500, { error: 'Unable to sign out right now.' });
  }
};
