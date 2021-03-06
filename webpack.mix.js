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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css/style.css');
 mix.sass('resources/assets/sass/app.scss', 'public/css/style.css');
 
 mix.combine([
     "node_modules/bootstrap/dist/css/bootstrap.min.css",
	'public/css/font-awesome.min.css',
	'public/css/material-kit.css',
	'public/css/style.css',
     ], 
    'public/css/app.css'


 );
 mix.combine([
     "node_modules/jquery/dist/jquery.js", 
     "node_modules/bootstrap/dist/js/bootstrap.min.js", 
    "public/js/jquery.nicescroll.min.js", 
    "public/js/tinymce.min.js",
    "public/js/material.min.js",  
     "public/js/material-kit.js", 
     "public/js/custom.js", 
     ], 
    'public/js/app.js'


 );
 // mix.combine(['one.js', 'two.js'], 'merged.js');