// Tailwind v3 config for the landing pages only (built by vite.landing.config.js).
// Kept separate from the app's Tailwind v4 setup so the design renders exactly as designed.
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    path.resolve(__dirname, '../views/landing/**/*.blade.php'),
    path.resolve(__dirname, '../data/**/*.php'),
    path.resolve(__dirname, './js/**/*.js'),
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          primary: '#204A7A',
          navy: '#1A3B62',
          blue: '#21487B',
          bg: '#F6F6F6',
          dark: '#1D1D1D',
          muted: '#8E98A8',
          border: '#DDE4ED',
          gold: '#C8A84B',
          purple: '#5C3E9B',
          spiritual: '#5B6ECC',
          pink: '#963056',
          orange: '#BC7B4A',
          teal: '#27797E',
          emerald: '#489674',
          yellow: '#B8AA44',
        }
      },
      fontFamily: {
        messiri: ['"El Messiri"', 'sans-serif'],
        cairo: ['"Cairo"', 'sans-serif'],
      },
      boxShadow: {
        'card': '0px 1.76px 3.53px -1.76px rgba(0, 0, 0, 0.1), 0px 1.76px 5.3px 0px rgba(0, 0, 0, 0.1)',
        'nav': '0px 10px 30px rgba(0, 0, 0, 0.05)',
        'floating': '0 20px 40px -15px rgba(32, 74, 122, 0.15)',
      },
      borderRadius: {
        '3xl': '24px',
        '4xl': '32px',
        '5xl': '42px',
        'nav': '48px',
      }
    },
  },
  plugins: [],
}
