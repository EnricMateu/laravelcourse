<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

    public function __construct()
    {
      //Se aplica a todos los metodos
      //this->middleware('example');

      //Se aplica a metodos en concreto
      //$this->middleware('example',['only'=>['home']]);

      // $this->middleware('example',['except'=>['home']]);
    }

    public function home()
    {
      return view('home');
    }


    public function contact()
    {
      return view('contact');
    }

    public function processMessage(Request $request)
    {

      $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email',
        'mensaje' => 'required|min:5'

      ]);

      return $request->all();

      $data = $request->all();

      Mail::send('emails.message',$data,function($message) use ($data){
        $message->from($data['email'],$data['name'])
                ->to('servio.za@gmail.com','Servio Zambrano')
                ->subject('Test Laravel App');
      });

      return back()->with('flash', $data['name'] . ' Tu mensaje ah sido recibido');
    }

    // public function prosessMessageTwo(CreateMessageRequest $request)
    // {
    //   return $request->all();
    // }

    public function prosessMessageTwo(CreateMessageRequest $request)
    {
      $data = $request->all();

      //return redirect()->route('contactos')->with('flash','Tu Mensaje ah sido enviado correctamente.');
      return back()->with('flash','Tu Mensaje ah sido enviado correctamente.');
    }

    public function saludo($nombre='Invitado')
    {
       return view('saludo',compact('nombre'));
    }


}
