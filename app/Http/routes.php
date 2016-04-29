<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use Illuminate\Support\Facades\Route;

/**
 * Main Routes
 */

Route::get('/', function () {
    
    return view('main.index');
});

Route::auth();

Route::get('/home', 'LoginController@index');

Route::get('/faq', 'FaqController@index');

Route::get('/portfolio', function(){
   
    return view ('main.portfolio');
});



/*
 * Member Routes
 */

Route::get('/member/profile', function(){
   return view ('member.profile'); 
});

Route::get('/member/about', function(){
    return view ('member.about');
});

Route::get('/member/skills', function(){
    return view ('member.skills');
});

Route::get('/member/works', function(){
    return view ('member.works');
});

Route::get('/member/statement', function(){
    return view ('member.statement');
});

Route::get('/member/change-password', function(){
    return view ('member.change_password');
});


/*
 * Admin Routes
 */





