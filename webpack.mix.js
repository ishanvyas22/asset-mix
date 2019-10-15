const mix = require('laravel-mix');

mix.setPublicPath('./webroot')
  .js('resources/js/app.js', 'webroot/js')
  .combine([
    'resources/css/base.css',
    'resources/css/style.css',
    'resources/css/home.css',
  ], 'webroot/css/main.css')
  .version();
