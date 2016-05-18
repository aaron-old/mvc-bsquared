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


Route::group(['middleware'=> ['web']], function(){
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

    Route::get('/profile/{username}', 'ProfileController@edit');
    Route::post('/profile/{username}', 'ProfileController@store');

    Route::get('/statement/{username}', 'StatementController@edit');
    Route::post('/statement/{username}', 'StatementController@store');

    Route::get('/about/{username}', 'AboutController@show');
    Route::post('/about/{username}', 'AboutController@store');

    Route::get('/skills/{username}', 'SkillsController@show');
    Route::post('/skills/{username}', 'SkillsController@store');

    Route::get('/works/{username}', 'WorksController@show');
    Route::post('/works/{username}', 'WorksController@store');



    Route::get('/settings/{username}', 'SettingsController@show');

    /*
     * Admin Routes
     */
});





