const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 8000;
const PUBLIC_DIR = path.join(__dirname, 'public');
const API_ROUTES = {
  '/api/auth/register': require('./api/auth/register'),
  '/api/auth/login': require('./api/auth/login'),
  '/api/auth/logout': require('./api/auth/logout'),
  '/api/auth/me': require('./api/auth/me'),
};

const server = http.createServer((req, res) => {
  const requestUrl = new URL(req.url, `http://${req.headers.host || 'localhost'}`);
  const apiHandler = API_ROUTES[requestUrl.pathname];

  if (apiHandler) {
    Promise.resolve(apiHandler(req, res)).catch((error) => {
      console.error(error);
      if (!res.headersSent) {
        res.writeHead(500, { 'Content-Type': 'application/json' });
      }
      res.end(JSON.stringify({ error: 'Internal server error.' }));
    });
    return;
  }

  let filePath = path.join(PUBLIC_DIR, decodeURIComponent(requestUrl.pathname));
  
  // Default to index.html for root path
  if (requestUrl.pathname === '/') {
    filePath = path.join(PUBLIC_DIR, 'index.html');
  }
  
  // Check if file exists
  fs.stat(filePath, (err, stats) => {
    if (err) {
      res.writeHead(404, { 'Content-Type': 'text/html' });
      res.end('<h1>404 Not Found</h1>');
      return;
    }
    
    // Serve the file
    const ext = path.extname(filePath).toLowerCase();
    let contentType = 'text/html';
    
    if (ext === '.css') contentType = 'text/css';
    else if (ext === '.js') contentType = 'application/javascript';
    else if (ext === '.json') contentType = 'application/json';
    else if (ext === '.png') contentType = 'image/png';
    else if (ext === '.jpg' || ext === '.jpeg') contentType = 'image/jpeg';
    else if (ext === '.gif') contentType = 'image/gif';
    else if (ext === '.svg') contentType = 'image/svg+xml';
    
    res.writeHead(200, { 'Content-Type': contentType });
    fs.createReadStream(filePath).pipe(res);
  });
});

server.listen(PORT, () => {
  console.log(`\n✅ Server running at http://localhost:${PORT}\n`);
});
