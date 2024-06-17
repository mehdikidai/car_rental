import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/frontend/app.scss",
                "resources/css/auth/app_login.scss",
                "resources/js/app.js",
                "resources/js/app_login.js"
            ],
            refresh: true,
        }),
    ],
});
