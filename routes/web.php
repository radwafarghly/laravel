<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users','UserController');
    
    
        Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
        Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
        Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
        Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
        Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
        Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
        Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);
    
    
        Route::get('project',['as'=>'projects.index','uses'=>'ProjectController@index','middleware' => ['permission:project-list|project-create|project-edit|project-delete']]);
        Route::get('project/create',['as'=>'projects.create','uses'=>'ProjectController@create','middleware' => ['permission:project-create']]);
        Route::post('project/create',['as'=>'projects.store','uses'=>'ProjectController@store','middleware' => ['permission:project-create']]);
        Route::get('project/{id}',['as'=>'projects.show','uses'=>'ProjectController@show']);
        Route::get('project/{id}/edit',['as'=>'projects.edit','uses'=>'ProjectController@edit','middleware' => ['permission:project-edit']]);
        Route::patch('project/{id}',['as'=>'projects.update','uses'=>'ProjectController@update','middleware' => ['permission:project-edit']]);
        Route::delete('project/{id}',['as'=>'projects.destroy','uses'=>'ProjectController@destroy','middleware' => ['permission:project-delete']]);
       



        Route::get('{id}/compound',['as'=>'projects.indexcompound','uses'=>'ProjectController@indexcompound','middleware' => ['permission:compound-list|compound-create|compound-edit|compound-delete']]);
        
        Route::get('compound/create/{id}',['as'=>'projects.createcompound','uses'=>'ProjectController@createcompound','middleware' => ['permission:compound-create']]);

        Route::post('compound/create/{id}',['as'=>'projects.storecompound','uses'=>'ProjectController@storecompound','middleware' => ['permission:compound-create']]);


        Route::delete('compound/{id}',['as'=>'projects.destroycompound','uses'=>'ProjectController@destroycompound','middleware' => ['permission:compound-delete']]);
        
      /*  Route::get('compound',['as'=>'compounds.index','uses'=>'CompoundController@index','middleware' => ['permission:compound-list|compound-create|compound-edit|compound-delete']]);

        Route::get('compound/create/{id}',['as'=>'compounds.create','uses'=>'CompoundController@create','middleware' => ['permission:compound-create']]);

        Route::post('compound/create',['as'=>'compounds.store','uses'=>'CompoundController@store','middleware' => ['permission:compound-create']]);

        Route::get('compound/{id}',['as'=>'compounds.show','uses'=>'CompoundController@show']);
        Route::get('compound/{id}/edit',['as'=>'compounds.edit','uses'=>'CompoundController@edit','middleware' => ['permission:compound-edit']]);

        Route::patch('compound/{id}',['as'=>'compounds.update','uses'=>'CompoundController@update','middleware' => ['permission:compound-edit']]);

        Route::delete('compound/{id}',['as'=>'compounds.destroy','uses'=>'CompoundController@destroy','middleware' => ['permission:compound-delete']]);
*/

});
