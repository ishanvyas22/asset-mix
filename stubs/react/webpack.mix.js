const mix = require('laravel-mix');

mix.setPublicPath('./webroot')
    .react('assets/js/app.js', 'webroot/js')
    .sass('assets/sass/app.scss', 'webroot/css')
    .version();
