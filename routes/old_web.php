<?php


Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('service', function () {
    return view('service');
});

Route::get('contactame', ['as' => 'contactos', function () {
  return view('contact');
}]);

Route::post('messages',function(){

  $data = request()->all();

  Mail::send('emails.message',$data,function($message) use ($data){
    $message->from($data['email'],$data['name'])
            ->to('servio.za@gmail.com','Servio Zambrano')
            ->subject('Test Laravel App');
  });

  return back()->with('flash', $data['name'] . ' Tu mensaje ah sido recibido');
})->name('messages');


// Obligatorio:
// Route::get('saludos/{nombre}',function($nombre){
//   return "Hola $nombre";
//});


//No Obligatorio sin Validacion:
 // Route::get('saludos/{nombre?}',function($nombre = "Invitado"){
 //  return "Hola $nombre";
 // });

//No Obligatorio con validacion
 Route::get('saludos/{nombre?}',function($nombre = "Invitado"){
  // return view('saludo')->with(['nombre' => $nombre]);
  //return view('saludo',['nombre' => $nombre]);
  return view('saludo',compact('nombre'));
})->where('nombre','[A-Za-z]+');


Route::get('loop', function(){

  $consolas = [
    'Play Station 4',
    'Xbox One',
    'Wii U'
  ];

  return view('consolas',compact('consolas'));

});
