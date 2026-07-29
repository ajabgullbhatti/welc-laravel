const MAX_BODY_BYTES = 16 * 1024;

function json(res, status, payload) {
  res.statusCode = status;
  res.setHeader('Content-Type', 'application/json; charset=utf-8');
  res.setHeader('Cache-Control', 'no-store');
  res.end(JSON.stringify(payload));
}

async function readJson(req) {
  if (req.body && typeof req.body === 'object' && !Buffer.isBuffer(req.body)) {
    return req.body;
  }

  if (typeof req.body === 'string') {
    return req.body ? JSON.parse(req.body) : {};
  }

  let body = '';

  for await (const chunk of req) {
    body += chunk;
    if (Buffer.byteLength(body) > MAX_BODY_BYTES) {
      const error = new Error('Request body is too large.');
      error.statusCode = 413;
      throw error;
    }
  }

  return body ? JSON.parse(body) : {};
}

function requireMethod(req, res, method) {
  if (req.method === method) {
    return true;
  }

  res.setHeader('Allow', method);
  json(res, 405, { error: `Only ${method} requests are allowed.` });
  return false;
}

function requireSameOrigin(req, res) {
  const origin = req.headers.origin;
  if (!origin) {
    return true;
  }

  try {
    const originHost = new URL(origin).host;
    const requestHost = req.headers['x-forwarded-host'] || req.headers.host;
    if (originHost === requestHost) {
      return true;
    }
  } catch {
    // Invalid origins are rejected below.
  }

  json(res, 403, { error: 'This request is not allowed.' });
  return false;
}

module.exports = {
  json,
  readJson,
  requireMethod,
  requireSameOrigin,
};
