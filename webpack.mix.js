const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/backend/partner/partner.js', 'public/backend/js/partner')
    .js('resources/js/backend/director/director.js', 'public/backend/js/director')
    .js('resources/js/backend/mission/mission.js', 'public/backend/js/mission')
    .sass('resources/sass/app.scss', 'public/css');
