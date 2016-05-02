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
    
    mix.copy('resources/assets/img/**', 'public/img');
    mix.copy('resources/assets/fonts/**', 'public/fonts');
    
    mix.sass([
        'app.scss',
        'buttons.scss',
        'form_style.scss',
        'portfolio_styles.scss'
    ]);

    mix.styles([
        'bootstrap.min.css'
    ], 'public/css/bootstrap.css', 'node_modules/bootstrap/dist/css/');

    mix.babel([
       'jquery.min.js'
    ], 'public/js/jquery.js', 'node_modules/jquery/dist/');

    mix.babel([
        'bootstrap.min.js'
    ], 'public/js/bootstrap.js', 'node_modules/bootstrap/dist/js/');
    
    mix.babel([
       'jquery.validate.min',
        'rollbar.js',
        'sha512.min.js',
        'forms.js'
    ]);
    
    mix.version([
        'public/css/app.css',
        'public/img/**',
        'public/js/all.js',
        'public/css/bootstrap.css',
        'public/js/jquery.js',
        'public/js/bootstrap.js'
    ]);
});
