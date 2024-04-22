/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./template/*.php","./node_modules/flowbite/**/*.js","./*.{php,html,js}"],
  theme: {
    extend: {},
  },
  plugins: [require('flowbite/plugin')],
}

