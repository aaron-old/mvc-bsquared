 var elixir = require('laravel-elixir');

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



elixir(function(mix) {

    var paths = {
        'jquery' : 'node_modules/jquery/dist/',
        'bootstrap' : 'node_modules/bootstrap/dist',
        'jquery_ui' : 'node_modules/jquery-ui/',
        'bootstrap_fonts' : 'node_modules/bootstrap'
    };

    mix.browserSync({
    });

    mix.copy(paths.bootstrap_fonts + '/fonts/**', 'public/fonts');
    mix.copy(paths.jquery_ui + 'themes/base/images/**', 'public/css/images');
    mix.copy('resources/assets/img/**', 'public/img')


    mix.sass([
        'app.scss'
    ]);

    mix.babel([
       paths.jquery + 'jquery.min.js',
        paths.jquery_ui + 'jquery-ui.js'
    ], null, 'node_modules');

    mix.styles([
        paths.bootstrap + '/css/bootstrap.css',
        paths.jquery_ui + 'themes/base/jquery.ui.all.css'],
        'public/css/site.css', 'node_modules').version(['public/css/site.css', 'public/css/app.css']);


});
