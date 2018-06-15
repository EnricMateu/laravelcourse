@extends('layout')

@section('content')
  <h1>Login</h1>


  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif

  <form class="" action="/login" method="post">
      {{ csrf_field() }}
      <input type="email" name="email" value="Email">
      <input type="password" name="password" value="Password">
      <input type="submit" value="Entrar">
  </form>


@stop
