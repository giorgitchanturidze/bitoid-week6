/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["**/*.twig", "../../../modules/**/*.twig"],
  theme: {
    extend: {
      colors: {
        violet: "#5964e0",
        light_violet: "#939bf4",
        very_dark: "#19202d",
        midnight: "#121721",
        light_grey: {
          50: "#f4f6f8",
          100: "#eeeffc",
          200: "#c5c9f4"
        },
        dark: "#303642",
        light_dark: "#696e76",
        grey: "#9daec2",
        dark_grey: "#6e8098",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
