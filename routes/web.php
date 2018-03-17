<?php

Route::get('test',function (){
    $user = new App\User;
    $user->name = 'Estudiante';
    $user->email = 'estudiante@local.com';
    $user->password = bcrypt('123123');
    $user->role = 'estudiante';
    $user->save();
    return $user;
});



Route::get('/', 'PagesController@home')->name('home');
Route::get('saludos/{nombre}', 'PagesController@saludo')->name('saludos')->where('nombre',"[A-Za-z]+");

Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');