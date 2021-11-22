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

mix
    .sass('resources/views/painel/bootstrap.scss', 'public/painel/bootstrap.css')
    .styles('resources/views/painel/login.css', 'public/painel/login.css')
    .scripts(['node_modules/jquery/dist/jquery.js'],'public/painel/jquery.js')
    .version();
