const fs = require('fs');
const path = require('path');

const mimeTypes = {
  '.html': 'text/html',
  '.css': 'text/css',
  '.js': 'application/javascript',
  '.json': 'application/json',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.gif': 'image/gif',
  '.svg': 'image/svg+xml',
  '.ico': 'image/x-icon',
  '.woff': 'font/woff',
  '.woff2': 'font/woff2',
};

module.exports = (req, res) => {
  const publicDir = path.join(process.cwd(), 'public');
  let filePath = path.join(publicDir, req.query.slug ? req.query.slug.join('/') : '');

  // Default to index.html for directory or root requests
  if (!filePath.endsWith('.html') && !filePath.includes('.')) {
    filePath = path.join(filePath, 'index.html');
  }

  // Security check to prevent directory traversal
  if (!filePath.startsWith(publicDir)) {
    res.status(403).end('Forbidden');
    return;
  }

  // If file doesn't exist, try index.html or return 404
  if (!fs.existsSync(filePath)) {
    const indexPath = path.join(publicDir, 'index.html');
    if (fs.existsSync(indexPath)) {
      filePath = indexPath;
    } else {
      res.status(404).end('Not Found');
      return;
    }
  }

  // Get file extension to set correct content type
  const ext = filePath.substring(filePath.lastIndexOf('.')).toLowerCase();
  const contentType = mimeTypes[ext] || 'text/plain';

  // Set response headers
  res.setHeader('Content-Type', contentType);
  
  // Set cache headers for static assets
  if (['.css', '.js', '.png', '.jpg', '.jpeg', '.gif', '.svg', '.woff', '.woff2'].includes(ext)) {
    res.setHeader('Cache-Control', 'public, max-age=31536000, immutable');
  } else {
    res.setHeader('Cache-Control', 'public, max-age=0, must-revalidate');
  }

  // Stream the file
  const fileStream = fs.createReadStream(filePath);
  fileStream.pipe(res);
  fileStream.on('error', () => {
    res.status(500).end('Server Error');
  });
};
