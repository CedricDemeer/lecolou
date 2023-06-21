/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./public/*.php", "./public/*.html", "./public/include/*.php", "./public/js/*.js"],
  theme: {
    extend: {
      colors: {
        'menu-color1': '#333',
      },
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    }
  },
  plugins: [],
}

