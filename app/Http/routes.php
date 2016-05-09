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

Route::get('/', 'MainController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/faq', 'FAQController@index');

Route::get('/portfolio/{username}', 'MainController@show');


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


