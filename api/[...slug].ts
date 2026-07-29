import { createReadStream, existsSync, statSync } from 'fs';
import { join } from 'path';
import { VercelRequest, VercelResponse } from '@vercel/node';

const mimeTypes: Record<string, string> = {
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

export default function handler(req: VercelRequest, res: VercelResponse) {
  let filePath = join(process.cwd(), 'public', req.query.slug ? (req.query.slug as string[]).join('/') : '');

  // Default to index.html for directory or root requests
  if (!filePath.endsWith('.html') && !filePath.includes('.')) {
    filePath = join(filePath, 'index.html');
  }

  // Security check to prevent directory traversal
  if (!filePath.startsWith(join(process.cwd(), 'public'))) {
    res.status(403).end('Forbidden');
    return;
  }

  // If file doesn't exist, try index.html or return 404
  if (!existsSync(filePath)) {
    const indexPath = join(process.cwd(), 'public', 'index.html');
    if (existsSync(indexPath)) {
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
  const fileStream = createReadStream(filePath);
  fileStream.pipe(res);
  fileStream.on('error', () => {
    res.status(500).end('Server Error');
  });
}
