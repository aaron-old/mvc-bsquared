<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

use Illuminate\Support\Facades\Route;

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

Route::get('/profile/{username}', 'ProfileController@show');

Route::get('/about/{username}', 'AboutController@show');

Route::get('/skills/{username}', 'SkillsController@show');

Route::get('/works/{username}', 'WorksController@show');

Route::get('/statement/{username}', 'StatementController@show');


/*
 * Admin Routes
 */


