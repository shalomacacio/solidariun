const mix = require('laravel-mix');

mix.webpackConfig({
   resolve: {
       extensions: ['.js', '.vue', '.css'],
       alias: {
           '@':__dirname+ '/resources'
       }
   }
});

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

// mix.js('resources/js/app.js', 'public/js')


mix.js('resources/js/app.js', 'public/js')
    .scripts([
    'resources/js/vendor/jquery.min.js',
    'resources/js/vendor/jquery.easing.1.3.js',
    'resources/js/vendor/jquery.stellar.min.js',
    'resources/js/vendor/jquery.flexslider-min.js',
    'resources/js/vendor/jquery.countTo.js',
    'resources/js/vendor/jquery.appear.min.js',
    'resources/js/vendor/circle-progress.min.js',
    'resources/js/vendor/jquery.magnific-popup.min.js',
    'resources/js/vendor/owl.carousel.min.js',
    'resources/js/vendor/bootstrap.min.js',
    'resources/js/vendor/jquery.waypoints.min.js'
    ],'public/js/scripts.js');

mix.copy([
    'resources/css/custom.css',
    'resources/css/style.css'], 'public/css/');

mix.copy([
    'resources/js/custom.js',
    'resources/js/main.js'], 'public/js/');

mix.sass('resources/sass/app.scss', 'public/css')
    .styles(['resources/sass/style.scss'
    ], 'public/css/app.css');

mix.combine([
    'resources/css/vendor/bootstrap.min.css',
    'resources/css/vendor/animate.css',
    'resources/css/vendor/icomoon.css',
    'resources/css/vendor/flexslider.css',
    'resources/css/vendor/owl.carousel.min.css',
    'resources/css/vendor/owl.theme.default.min.css',
    'resources/css/vendor/magnific-popup.css',
    'resources/css/vendor/photoswipe.css',
    'resources/css/vendor/default-skin.css',
    'resources/fonts/icomoon/style.css',
], 'public/css/styles-merged.css');
