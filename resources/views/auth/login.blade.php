@extends('layout')

@section('content')
  <h1>Login</h1>


  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif

  <form class="form-inline" action="/login" method="post">
      {{ csrf_field() }}
      <input class="form-control"type="email" name="email" value="Email">
      <input class="form-control"type="password" name="password" value="Password">
      <input class="form-control btn btn-primary"type="submit" value="Entrar">
  </form>


@stop
