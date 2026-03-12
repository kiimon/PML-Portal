import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        host: 'pml-portal.lgu-pilarsor.ph',
        port: 5173,
        https: {
            key: '/etc/letsencrypt/live/pml-portal.lgu-pilarsor.ph/privkey.pem',
            cert: '/etc/letsencrypt/live/pml-portal.lgu-pilarsor.ph/fullchain.pem',
        },
    },
})