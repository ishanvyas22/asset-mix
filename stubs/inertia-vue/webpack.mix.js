const mix = require('laravel-mix');
const path = require('path');

mix.setPublicPath('./webroot')
    .js('assets/js/app.js', 'public/js')
    .sass('assets/css/app.css', 'public/css/app.css')
    .webpackConfig({
        output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
            resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('assets/js'),
            },
        },
    })
    .version()
    .sourceMaps();
