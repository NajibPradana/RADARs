import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resource/js/script.js',
                'resource/js/dropdown.js',
                'resource/js/eyes.js',
                'resources/js/dashboard_button.js',
                'resources/js/lembaga-select.js',
                'resources/js/delete-confirmation.js',
                'resources/js/pop_up.js'
            ],
            refresh: true,
        }),
    ],
});
