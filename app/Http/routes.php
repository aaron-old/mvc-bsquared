<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|Route::get($uri, $callback);
|Route::post($uri, $callback);
|Route::put($uri, $callback);
|Route::patch($uri, $callback);
|Route::delete($uri, $callback);
|Route::options($uri, $callback);
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
Route::post('/profile/{username}', 'ProfileController@store');

Route::get('/about/{username}', 'AboutController@show');
Route::post('/about/{username}', 'AboutController@post');

Route::get('/skills/{username}', 'SkillsController@show');

Route::get('/works/{username}', 'WorksController@show');

Route::get('/statement/{username}', 'StatementController@show');



/*
 * Admin Routes
 */


