/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        display: ['Manrope', 'sans-serif'],
      },
      colors: {
        primary: '#0b6f33',
      },
    },
  },
  plugins: [],
}
