import path from 'path';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import VueI18nPlugin from '@intlify/unplugin-vue-i18n/vite'

export default defineConfig({
    server: {
        host: '0.0.0.0', // needed for the Docker Container port mapping to work
        strictPort: true,
        port: 5173,
        watch: {
            usePolling: true
        },
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/app.css'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },

        }),
        VueI18nPlugin({
            include: path.resolve(__dirname, './resources/js/locales/**')
        })
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js/'),
        },
    },
});
