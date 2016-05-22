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


Route::group(['middlewareGroups'=> ['web']], function(){
    /*
     * Main Routes
     */
    Route::get('/', 'MainController@index');

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/faq', 'FAQController@index');

    Route::get('/portfolio/{username}', 'MainController@showPortfolio');


    /**
     * Member Routes
     */
    Route::get('/profile/{username}', [
        'uses' => 'ProfileController@edit',
        'as'   => 'editProfile'
    ]);

    Route::post('/profile/{username}', [
        'uses' => 'ProfileController@store',
        'as'   => 'postProfile'
    ]);

    Route::get('/statement/{username}', [
        'uses' => 'StatementController@edit',
        'as'   => 'editStatement'
    ]);

    Route::post('/statement/{username}', [
        'uses' => 'StatementController@store',
        'as'   => 'postStatement'
    ]);

    Route::get('/about/{username}', [
        'uses' => 'AboutController@edit',
        'as'   => 'editAbout'
    ]);

    Route::post('/about/{username}', [
        'uses' => 'AboutController@store',
        'as'   => 'postAbout'
    ]);

    Route::get('/skills/{username}', [
        'uses' => 'SkillsController@show',
        'as'   => 'editSkills'
    ]);
    Route::post('/skills/{username}', [
        'uses' => 'SkillsController@store',
        'as'   => 'postSkills'
    ]);

    Route::get('/works/{username}', [
        'uses' => 'WorksController@show',
        'as'   => 'editWorks'

    ]);
    Route::post('/works/{username}', [
        'uses' => 'WorksController@store',
        'as'   => 'postWorks'
    ]);

    Route::get('/settings/{username}', [
        'uses' =>'SettingsController@show',
        'as'   => 'editSettings'
    ]);

    /*
     * Admin Routes
     */
});





