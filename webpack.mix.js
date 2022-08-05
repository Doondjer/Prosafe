const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .copy('node_modules/@tabler/core/dist/js/tabler.min.js', 'public/js')
    .copy('node_modules/@tabler/core/dist/libs/litepicker/dist/litepicker.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/tabler.scss', 'public/css/admin.css');
