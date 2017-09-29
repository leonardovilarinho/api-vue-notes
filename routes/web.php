<?php

/*
Verb    Path                        Action  Route Name
GET     /users                      index   users.index
GET     /users/create               create  users.create
POST    /users                      store   users.store
GET     /users/{user}               show    users.show
GET     /users/{user}/edit          edit    users.edit
PUT     /users/{user}               update  users.update
DELETE  /users/{user}               destroy users.destroy
*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header('Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS, DELETE');

Route::post('usuario/login', 'UserController@verify');
Route::post('usuario', 'UserController@store');
Route::get('notas', 'NoteController@index');
Route::post('notas', 'NoteController@store');
Route::post('notas/{note}', 'NoteController@destroy');
