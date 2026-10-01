import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcssV3 from 'tailwindcss-v3';
import autoprefixer from 'autoprefixer';

// Landing pages build — isolated from vite.config.js.
// Uses Tailwind v3 (the version the design was built with) so the output CSS matches the design 1:1.
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/landing/style.css',
                'resources/landing/js/main.js',
                'resources/landing/js/lifeWheelExplore.js',
                'resources/landing/js/lifeWheelAssessment.js',
                'resources/landing/js/lifeWheelResult.js',
                'resources/landing/js/resultWheel.js',
                'resources/landing/js/lifeWheelDetails.js',
            ],
            buildDirectory: 'landing/build',
            hotFile: 'public/landing.hot',
            refresh: ['resources/views/landing/**'],
        }),
    ],
    css: {
        // Inline PostCSS config so no postcss.config.js is picked up by the main app build.
        postcss: {
            plugins: [
                tailwindcssV3({ config: './resources/landing/tailwind.config.js' }),
                autoprefixer(),
            ],
        },
    },
    build: {
        // Same browser targets as the design's original Vite 5 build, so CSS/JS are minified identically.
        target: ['es2020', 'edge88', 'firefox78', 'chrome87', 'safari14'],
    },
    server: {
        port: 5174,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
