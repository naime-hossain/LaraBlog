const { mix } = require('laravel-mix');

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

mix.sass('resources/assets/sass/app.scss', 'public/css/style.css');


mix.combine([
    "node_modules/jquery/dist/jquery.js", 
    "resources/assets/js/jquery.nicescroll.min.js", 
    "resources/assets/js/material.min.js", 
    "resources/assets/js/material-kit.js", 
    "resources/assets/js/material-kit.js",
], 'public/assets/js/app.js');
