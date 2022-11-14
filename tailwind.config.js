const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    'primary-1': '#007A8C',
                    'primary-2': '#00A2C2',
                    'primary-3': '#E5F6F8',
                    'secondary-1': '#FF8200',
                    'secondary-2': '#FFF9F2',
                    'secondary-3': '#FFF9F2',
                    'grey-1': '#2D2E30',
                    'grey-2': '#53565A',
                    'grey-3': '#EEEEEE',
                    'grey-4': '#F6F7F7'
                }
            },
            maxWidth: {
              'large': '1440px',
              'medium': '920px',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
