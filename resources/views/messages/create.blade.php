@extends('layout')

@section('content')
  <h1>Contact</h1>

  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif


  <form class="" action="{{ route('mensajes.store') }}" method="post">
      {{ csrf_field() }}
      <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
      {!! $errors->first('name','<span class="error">:message</span>') !!}
      <br>
      <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
      {!! $errors->first('email','<span class="error">:message</span>') !!}
      <br>
      <textarea name="mensaje" rows="8" cols="80">{{ old('mensaje') }}</textarea>
      {!! $errors->first('mensaje','<span class="error">:message</span>') !!}
      <br>
      <input type="submit" name="" value="Send">
  </form>
@stop
