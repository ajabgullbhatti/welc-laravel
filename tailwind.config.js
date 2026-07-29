/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./resources/views/**/*.blade.php', './public/**/*.html'],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#f0f9ff',
          500: '#0f766e',
          700: '#0f172a'
        }
      }
    }
  },
  plugins: []
};
