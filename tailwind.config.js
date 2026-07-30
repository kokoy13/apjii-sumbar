import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Plus Jakarta Sans', 'Inter', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                apjii: {
                    navy: '#0A2540',
                    blue: '#0055A5',
                    accent: '#0066FF',
                    light: '#F4F7FA',
                    subtle: '#EBF3FF',
                    surface: '#FFFFFF',
                    dark: '#0F172A',
                    muted: '#64748B',
                },
            },
            boxShadow: {
                'soft': '0 4px 20px -2px rgba(10, 37, 64, 0.05)',
                'glass': '0 8px 32px 0 rgba(0, 85, 165, 0.08)',
                'card': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
            },
        },
    },

    plugins: [forms],
};
