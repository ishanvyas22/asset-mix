const mix = require('laravel-mix');

mix.setPublicPath('./webroot')
    .js('assets/js/app.js', 'webroot/js')
    .sass('assets/sass/app.sass', 'webroot/css')
    .version();
