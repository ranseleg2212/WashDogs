import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
  ],
  build: {
    rollupOptions: {
      input: {
        main: './resources/js/app.js',
      },
      output: {
        chunkFileNames: 'js/[name]-[hash].js',
        entryFileNames: 'js/[name].js',
        assetFileNames: 'images/[name]-[hash][extname]',
      },
      external: ['jquery'],
    },
  },
});
