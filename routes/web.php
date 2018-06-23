<?php

Route::get('create_admin',function(){
  $user = new App\User;
  $user->name     = 'Servio';
  $user->email    = 'servio.za@gmail.com';
  $user->password = bcrypt('123456');
  $user->role     = 'admin';
  $user->save();

  return $user;
});

Route::get('create_moderador',function(){
  $user = new App\User;
  $user->name     = 'Virginia';
  $user->email    = 'virginialabarca92@gmail.com';
  $user->password = bcrypt('123456');
  $user->role     = 'moderador';
  $user->save();

  return $user;
});

$home = [
  'as'   => 'home',
  'uses' => 'PagesController@home'
];

$saludo   = [
  'uses' => 'PagesController@saludo',
  'as'   => 'saludo'
];



Route::get('/', $home);

Route::get('saludos/{nombre?}',$saludo)->where('nombre','[A-Za-z]+');

Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');


Route::get('login',['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::post('login','Auth\LoginController@login');

Route::get('logout','Auth\LoginController@logout');
