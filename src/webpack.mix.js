const mix = require('laravel-mix');
const glob = require('glob');

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

(glob.sync('resources/sass/pages/**/*.scss') || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace('resources/sass', 'public/css').replace(/\.scss$/, '.css'));
});

(glob.sync('resources/js/pages/**/*.js') || []).forEach(file => {
    mix.js(file, `public/${file.replace('resources/', '')}`);
});

mix.version();