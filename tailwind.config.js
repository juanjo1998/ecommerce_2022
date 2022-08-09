const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors') 

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{               
                violet:colors.violet,
                purple:colors.purple
            }
        },  
        fontSize: {
            // Or with a default line-height as well
            '4xl': '35px'
        }        
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
