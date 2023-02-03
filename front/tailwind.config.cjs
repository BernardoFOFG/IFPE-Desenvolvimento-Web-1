/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.svelte"],
  theme: {
    extend: {
      fontFamily: {
        sans: [
          "Nunito, sans-serif"
        ]
      },
      backgroundImage: {
        'header-background': "url('./public/blob.svg')"
      }
    },
  },
  plugins: [],
};
