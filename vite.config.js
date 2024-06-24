import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/frontend/app.scss",
                "resources/css/auth/app_login.scss",
                "resources/js/app.js",
                "resources/js/app_login.js",
                "resources/js/alert.js",
                "resources/css/backend/app.scss",
                "resources/js/backend.js",
            ],
            refresh: true,
        }),
    ],
});
