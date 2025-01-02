import { defineConfig } from 'vite';

export default defineConfig({
  base: './',
  css: {
    preprocessorOptions: {
      scss: {
        // additionalData: `@import "@/styles/variables.scss";`, // Импорт дополнительных файлов SCSS
        sourceMap: true,
      },
    },
  },
  resolve: {
    alias: {
      '@': '/src',
    },
  },
  build: {
    rollupOptions: {
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,

        assetFileNames: ({ name }) => {
          if (/\.(gif|jpe?g|png|svg)$/.test(name ?? "")) {
            return "images/[name][extname]";
          }

          if (/\.(ttf|otf|eot|fnt|woff)$/.test(name ?? "")) {
            return "fonts/[name][extname]";
          }

          if (/\.css$/.test(name ?? "")) {
            return "main[extname]";
          }

          return "[name][extname]";
        },
      },
      input: {
        main: 'src/js/index.js', // Главная точка входа
      },
    }
  },
});