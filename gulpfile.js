 var elixir = require('laravel-elixir');

 var gulp = require('gulp');
 var livereload = require('gulp-livereload');

 gulp.task('default', ['live-monitor']);

 gulp.task('laravel-views', function(){

     gulp.src('resources/views/**/*.blade.php')
         .pipe(livereload());
 });


 gulp.task('live-monitor', function(){
    livereload.listen();
     gulp.watch('resources/views/**/*.blade.php', ['laravel-views']);
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



elixir(function(mix) {
    
    mix.copy('resources/assets/img/**', 'public/images');
    mix.copy('resources/assets/fonts/**', 'public/fonts');
    mix.copy('node_modules/bootstrap/fonts/**', 'public/fonts');
    mix.copy('node_modules/jquery-ui/themes/ui-lightness/images/**', 'public/images');
    
    mix.sass([
        'app.scss',
        'buttons.scss',
        'portfolio_styles.scss',
        'form_style.scss'
    ]);

    mix.sass([
        'buttons.scss',
        'portfolio_styles.scss'
    ], 'public/css/portfolio.css', 'resources/assets/sass/');

    mix.styles([
        'bootstrap.min.css',
        'bootstrap-theme.min.css'
    ], 'public/css/bootstrap.css', 'node_modules/bootstrap/dist/css/');
    
    mix.styles([
        'jquery-ui.min.css'
    ], 'public/css/jquery-ui.css', 'node_modules/jquery-ui/themes/ui-lightness/');

    mix.babel([
       'jquery.min.js'
    ], 'public/js/jquery.js', 'node_modules/jquery/dist/');

    mix.babel([
        'bootstrap.min.js'
    ], 'public/js/bootstrap.js', 'node_modules/bootstrap/dist/js/');

    mix.babel([
       'underscore-min.js'
    ], 'public/js/underscore.js', 'node_modules/underscore/');


    mix.babel([
        'jquery.validate.min.js',
        'rollbar.js',
        'sha512.min.js'
    ]);

    mix.babel([
        'Bsquared.js',
        'Portfolio.js',
        'LoginForms.js',
        'Skills.js',
        'UserControls.js',
        'Profile.js',
        'Forms.js',
        'Notifications.js',
        'Statement.js',
        'About.js',
        'Overview.js',
        'Works.js',
        'Destinations.js'
    ], 'public/js/Bsquared.js', 'resources/assets/js/');


    mix.version([
        'public/css/app.css',
        'public/img/**',
        'public/js/all.js',
        'public/css/bootstrap.css',
        'public/css/portfolio.css',
        'public/js/jquery.js',
        'public/js/bootstrap.js',
        'public/js/underscore.js',
        'public/js/Bsquared.js',
        'public/css/loginStyles.css',
        'public/css/jquery-ui.css',
        'public/fonts/**'
    ]);
});
