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
     "node_modules/bootstrap/dist/js/bootstrap.min.js", 
    "public/js/jquery.nicescroll.min.js", 
    "public/js/material.min.js", 
     "public/js/material-kit.js", 
     "public/js/custom.js", 
     ], 
    'public/assets/js/app.js'


 );
