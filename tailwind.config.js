/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./resources/**/*.blade.php"
    ],
    theme: {
        extend: {
            colors: {
                primary: colors.indigo
            },
        },
        screens: {
            'xs': '384px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
        },
    },
    plugins: [],
}
