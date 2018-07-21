<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\MessageWasReceived;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{

   function __construct()
   {
      $this->middleware('auth',['except' => ['create','store']]);
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Consulta no optimizada:
        $messages = Message::all()*/;
        /*Consulta optimizada*/
        $messages = Message::with(['user','note','tags'])->get();
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {


        // DB::table('messages')->insert([
        //   'name'       => $request->input('name'),
        //   'email'      => $request->input('email'),
        //   'mensaje'    => $request->input('mensaje'),
        //   'created_at' => Carbon::now(),
        //   'updated_at' => Carbon::now(),
        // ]);

        //dd($request->all());
        $message = Message::create($request->all());


        if(auth()->check()){
          auth()->user()->messages()->save($message);
        }

        event(new MessageWasReceived($message));


        return redirect()->route('mensajes.index')->with('flash','Mensaje Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $message = DB::table('messages')->where('id',$id)->first();
        // $message = Message::find($id);
        $message = Message::findOrFail($id);
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message = DB::table('messages')->where('id',$id)->first();

        $message = Message::findOrFail($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMessageRequest $request, $id)
    {
      // $message = DB::table('messages')->where('id',$id)->update([
      //   'name'       => $request->input('name'),
      //   'email'      => $request->input('email'),
      //   'mensaje'    => $request->input('mensaje'),
      //   'updated_at' => Carbon::now(),
      // ]);

      $message = Message::findOrFail($id);

      $message->update($request->all());

      return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('messages')->where('id',$id)->delete();

        Message::findOrFail($id)->delete();

        return redirect()->route('mensajes.index');
    }
}
