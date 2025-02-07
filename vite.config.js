import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',  // ここに tailwind のディレクティブが書かれたファイルを指定
                'resources/js/app.js',    // JSエントリ
            ],
            refresh: true,
        }),
    ],
});
