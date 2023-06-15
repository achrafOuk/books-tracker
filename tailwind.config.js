const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
              'gray':{
                '900':'#f2f2f2',
               },
              'orange':'#FF7541',
              'purple':'#6B5ED5'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
