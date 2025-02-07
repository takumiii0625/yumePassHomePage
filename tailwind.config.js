/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue', // VueやReactの場合に応じて設定
        './resources/**/*.js',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
