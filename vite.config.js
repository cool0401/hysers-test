import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './resources/js'),
    },
  },
  build: {
    outDir: 'public/build',
    manifest: true,
    manifestFileName: 'manifest.json',
    emptyOutDir: true,
    rollupOptions: {
        input: {
            app: 'resources/js/app.js',
            appCss: 'resources/css/app.css',
        },
    },
  },
  //publicDir: 'public'
});
