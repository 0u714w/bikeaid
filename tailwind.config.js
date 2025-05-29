import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // 👈 required for toggle
  content: ['./resources/**/*.{blade.php,js,vue}'],
  theme: {
    extend: {},
  },
  plugins: [],
    content: [
      './resources/**/*.{blade.php,js,vue}',
    ],
    theme: {
      extend: {
        colors: {
          primary: '#2563eb',
          secondary: '#6b7280',
          accent: '#facc15',
          background: '#f3f4f6',
        },
      },
    },
    plugins: [],
  }
  

  