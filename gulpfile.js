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
    
    mix.babel([
       'jquery.validate.min',
        'rollbar.js',
        'sha512.min.js',
        'forms.js'
    ]);
    
    mix.version([
        'public/css/app.css',
        'public/img/**'
        ]);
});
