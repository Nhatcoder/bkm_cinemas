import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { exec } from "child_process";
import path from "path";

export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: true,
    }),
    {
      handleHotUpdate({ file, server }) {
        if (
          file.includes("routes/") ||
          file.includes("resources/views/") ||
          file.includes("config/")
        ) {
          exec("php artisan optimize", (error, stdout, stderr) => {
            if (error) {
              console.error(`exec error: ${error}`);
              return;
            }
            console.log(`All caches cleared: ${stdout}`);
          });
        }
      },
    },
  ],
  resolve: {
    alias: {
      'jquery.inputmask': path.resolve('node_modules/inputmask/dist/jquery.inputmask.js')
    }
  },
    optimizeDeps: {
        include: ['jquery', 'bootstrap-select'],
    },
});
