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
    .sass('resources/sass/app.scss', 'public/css');

// mix.scripts([
//     'resources/assets/js/jquery.js',
//     'resources/assets/js/popper.js',
//     'resources/assets/js/bootstrap.js',
//     'resources/assets/js/app.js',
//     ],'public/js/app.js').version();
// mix.sass('resources/assets/sass/app.scss', 'public/css').version();
    