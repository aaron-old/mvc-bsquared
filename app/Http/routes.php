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



Route::get('/', function () {
    
    return view('main.index');
});


Route::auth();

Route::get('/home', 'LoginController@index');



Route::get('/faq', function(){
    
   return view ('main.faq'); 
});

Route::get('/portfolio', function(){
   
    return view ('main.portfolio');
});