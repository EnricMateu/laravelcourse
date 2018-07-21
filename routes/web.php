<?php

// DB::listen(function($query){
//   echo "<pre> {$query->sql} </pre>";
// });
Route::get('create_admin',function(){
  $user = new App\User;
  $user->name     = 'Servio';
  $user->email    = 'servio@gmail.com';
  $user->password = 123456;
  $user->save();

  $user->roles()->attach([1]);

  return $user;
});

Route::get('create_moderador',function(){
  $user = new App\User;
  $user->name     = 'Virginia';
  $user->email    = 'virginialabarca92@gmail.com';
  $user->password = bcrypt('123456');
  $user->role_id     = 2;
  $user->save();

  return $user;
});

Route::get('create_estudiante',function(){
  $user = new App\User;
  $user->name     = 'Servio Zambrano';
  $user->email    = 'serviozambrano@gmail.com';
  $user->password = bcrypt('123456');
  $user->role     = 'estudiante';
  $user->save();

  return $user;
});

Route::get('roles',function(){
  //return \App\Role::all();
  return \App\Role::with('user')->get();
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
