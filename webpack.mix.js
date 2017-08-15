let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copy('vendor/kartik-v/bootstrap-fileinput/js/fileinput.min.js', 'public/js')
    .copy('node_modules/magnific-popup/dist/jquery.magnific-popup.min.js', 'public/js')
    .copy('node_modules/magnific-popup/dist/magnific-popup.css', 'public/css');

