/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily:{
        'montse': ['Montserrat', 'sans-serif']
      },
      colors: {
        'primary': '#13547a',
      },
    },
  },
  plugins: [],
}

