<?php



$home = [
  'as'   => 'home',
  'uses' => 'PagesController@home'
];

$contact = [
  'as'   => 'contactos',
  'uses' => 'PagesController@contact'
];

$messages = [
  'uses' => 'PagesController@prosessMessageTwo'
];

$saludo   = [
  'uses' => 'PagesController@saludo',
  'as'   => 'saludo'
];



Route::get('/', $home);

Route::get('mensajes', $contact);

Route::post('messages',$messages)->name('messages');

Route::get('saludos/{nombre?}',$saludo)->where('nombre','[A-Za-z]+');


//Implementacion de REST 7:

// Route::get('mensajes',['as' => 'messages.index','uses'=> 'MessagesController@index']);
//
// Route::get('mensajes/create',['as' => 'messages.create','uses'=> 'MessagesController@create']);
//
// Route::post('mensajes',['as' => 'messages.store','uses'=> 'MessagesController@store']);
//
// Route::get('mensajes/{id}',['as' => 'messages.show','uses'=> 'MessagesController@show']);
//
// Route::get('mensajes/{id}/edit',['as' => 'messages.edit','uses'=> 'MessagesController@edit']);
//
// Route::put('mensajes/{id}',['as' => 'messages.update','uses'=> 'MessagesController@update']);
//
// Route::delete('mensajes/{id}',['as' => 'messages.destroy','uses'=> 'MessagesController@destroy']);

// Refactorizacion en Forma REST 1 Line
Route::resource('mensajes','MessagesController');
