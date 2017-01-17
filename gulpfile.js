require('events').EventEmitter.defaultMaxListeners = 30;

const elixir = require('laravel-elixir'),
    cssnext = require('postcss-cssnext');

require('laravel-elixir-browserify-official');
require('laravel-elixir-browserify-hmr');

elixir.config.js.browserify.transformers.push({
    name: 'vueify',

    options: {
        postcss: [cssnext({
            autoprefixer: {
                browsers: ['last 2 versions', 'ie >= 8', 'safari 5', 'opera 12.1', 'ios 6', 'android 4']
            }
        })]
    }
});

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.less('app.less')
       .browserify('app.js');

    mix.version(['css/app.css', 'js/app.js'])
        .copy('resources/assets/images', 'public/images');

    if (process.env.NODE_ENV !== 'production') {

        mix.browserSync({
            proxy: 'http://portfolio.dev',
            files: [
                elixir.config.appPath + '/**/*.php',
                elixir.config.get('public.css.outputFolder') + '/**\/*.css',
                elixir.config.get('public.versioning.buildFolder') + '/rev-manifest.json',
                'resources/views/**/*.php'
            ],
            browser: ['yandex']
        });
    }
});
