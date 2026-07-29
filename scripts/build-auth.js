const fs = require('fs');
const path = require('path');

const projectRoot = path.resolve(__dirname, '..');
const source = path.join(projectRoot, 'resources', 'js', 'auth.js');
const outputDirectory = path.join(projectRoot, 'public', 'js');
const output = path.join(outputDirectory, 'auth.js');

fs.mkdirSync(outputDirectory, { recursive: true });
fs.copyFileSync(source, output);

console.log('Authentication client prepared.');
