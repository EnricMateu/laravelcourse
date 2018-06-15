@extends('layout')

@section('content')
  <h1>Editar Mensaje</h1>


  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif


    <form class="" action="{{ route('mensajes.update',$message->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="text" name="name" value="{{ $message->name }}" placeholder="Name">
        {!! $errors->first('name','<span class="error">:message</span>') !!}
        <br>
        <input type="text" name="email" value="{{ $message->email }}" placeholder="Email">
        {!! $errors->first('email','<span class="error">:message</span>') !!}
        <br>
        <textarea name="mensaje" rows="8" cols="80">{{ $message->mensaje }}</textarea>
        {!! $errors->first('mensaje','<span class="error">:message</span>') !!}
        <br>
        <input type="submit" name="" value="Send">
    </form>


@stop
