/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.ts",
        "./app/**/*.php",
        "./vendor/laravel/framework/src/Illuminate/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                background: "#0B0A0F",
                card: "#15131A",
                primary: "#FFFFFF",
                secondary: "#9CA3AF",
                accent: "#C9A7E0",
                accent2: "#E5B8D9",
                positive: "#4ADE80",
            },
            borderRadius: {
                xl: "20px",
            },
            fontFamily: {
                sans: ["Inter", "ui-sans-serif", "system-ui", "sans-serif"],
            },
            boxShadow: {
                card: "0 4px 12px rgba(0,0,0,0.3)",
            },
        },
    },
    plugins: [],
};