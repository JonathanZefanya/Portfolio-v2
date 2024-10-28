/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        fontFamily: {
            inter: ["Inter"],
        },
    },
    plugins: [require("flowbite/plugin")],
};
