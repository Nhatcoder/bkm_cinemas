import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
  prefix: "tw-",
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.{js,jsx,ts,tsx}",
    "node_modules/flowbite-react/lib/esm/**/*.js",
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ["Figtree", ...defaultTheme.fontFamily.sans],
      },
      gridTemplateColumns: gridTemplateColumns(30),
      colors: {
        "empty-seat": "#000000",
        "standard-seat": "#FFFFFF",
        "couple-seat": "#FFB6C1",
        "vip-seat": "#FFD700",
        "accessible-seat": "#32CD32",
      },
    },
  },

  safelist: [
    "hidden",
    {
      pattern: /grid-cols-.*/,
    },
    {
      pattern: /col-span-.*/,
    },
    {
      pattern: /bg-.*/,
    },
    {
      pattern: /border-.*/,
    },
    {
      pattern: /text-.*/,
    },
  ],

  plugins: [forms, require("daisyui"), require("flowbite/plugin")],
};

function gridTemplateColumns(maxColumns) {
  const columns = {};
  for (let i = 13; i <= maxColumns; i++) {
    columns[i] = `repeat(${i}, minmax(0, 1fr))`;
  }
  return columns;
}
