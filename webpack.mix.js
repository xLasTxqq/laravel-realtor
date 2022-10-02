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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
mix.js('resources/js/edit-application.js', 'public/js/edit-application.js');
mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/jquery.maskedinput.js',
    'resources/js/create-application.js'
], 'public/js/create-application.js');
mix.styles([
    'resources/css/css-font.css',
    'resources/css/master.css',
    'resources/css/bootstrap.min.css',
],'public/css/master.css')