/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        backgroundImage:{
            authBg: "url('./resources/img/auth_bg.png')"
        }
    },
  },
  plugins: [],
    darkMode: 'selector'
}
const colors = require('tailwindcss/colors')
