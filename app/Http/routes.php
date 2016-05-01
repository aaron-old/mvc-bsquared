<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

use Illuminate\Support\Facades\Route;


/*
 * Test Routes
 */

Route::get('/file_paths', 'FilePathLookupController@index');
Route::get('/file_paths/{destination_id}', 'FilePathLookupController@show');

/*
 * Main Routes
 */

Route::get('/', 'MainPagesController@index');

Route::get('/faq', 'MainPagesController@faq');

Route::get('/portfolio/{user_id}', 'PortfolioController@show');

Route::get('/portfolio', 'PortfolioController@index');

Route::get('/login', 'LoginController@index');

Route::auth();


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

