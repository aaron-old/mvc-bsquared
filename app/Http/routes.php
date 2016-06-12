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

use Illuminate\Http\Request;
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
    
    
    /*-----------------
           PROFILE
     ---------------*/
    Route::get('/profile/{username}', [
        'uses' => 'ProfileController@edit',
        'as'   => 'editProfile'
    ]);

    Route::post('/profile/{username}', [
        'uses' => 'ProfileController@store',
        'as'   => 'postProfile'
    ]);

    /*----------------------
            STATEMENT
     -------------------*/

    Route::get('/statement/{username}', [
        'uses' => 'StatementController@edit',
        'as'   => 'editStatement'
    ]);

    Route::post('/statement/{username}', [
        'uses' => 'StatementController@store',
        'as'   => 'postStatement'
    ]);
    
    /*-------------------------
                ABOUT
     --------------------------*/

    Route::get('/about/{username}', [
        'uses' => 'AboutController@edit',
        'as'   => 'editAbout'
    ]);

    Route::post('/about/{username}', [
        'uses' => 'AboutController@store',
        'as'   => 'postAbout'
    ]);
    
    /*---------------------------
                SKILLS
     ----------------------------*/

    Route::get('/skills/{username}', [
        'uses' => 'SkillsController@edit',
        'as'   => 'editSkills'
    ]);
    Route::post('/skills/{username}', [
        'uses' => 'SkillsController@store',
        'as'   => 'postSkills'
    ]);
    
    /*-------------------------------
                 WORKS
     -----------------------------*/

    Route::get('/works/{username}', [
        'uses' => 'WorksController@edit',
        'as'   => 'editWorks'

    ]);
    Route::post('/works/{username}', [
        'uses' => 'WorksController@store',
        'as'   => 'postWorks'
    ]);
    
    Route::get('/works/{username}/{destination_id}', [
        'uses' => 'WorksController@show',
        'as'   => 'getWorks'
    ]);
    
    /*---------------------------
            SETTINGS
     ----------------------------*/

    Route::get('/settings/{username}', [
        'uses' =>'SettingsController@show',
        'as'   => 'editSettings'
    ]);
    
    Route::post('/settings/{username}', [
        'uses' => 'SettingsController@store',
        'as' => 'postSettings'
    ]);

    /*----------------------
            LABELS
     -----------------------*/
    
    Route::get('/label/{destinationID}', [
        'uses' => 'LabelController@edit',
        'as' => 'editLabel'
    ]);
    
    Route::post('/label', [
        'uses' => 'LabelController@store',
        'as' => 'postLabel'
    ]);
    
    /*-----------------------
            COLUMNS
     ------------------------*/
    
    Route::get('/column/{destinationID}', [
       'uses' => 'ColumnController@edit',
        'as' => 'editColumn'
    ]);
    
    Route::post('/column', [
        'uses' => 'ColumnController@store',
        'as' => 'postColumn'
    ]);
    
    /*-----------------------
            PATHS
     -----------------------*/
    
    Route::get('/path/{destinationID}', [
       'uses' => 'PathController@edit',
        'as' => 'editColumn'
    ]);
    
    Route::post('/path', [
        'uses' => 'PathController@store',
        'as' => 'postPath'
    ]);

    /*
     * Admin Routes
     */
});





