@extends('layout')

@section('content')

  <h1>Editar Usuario</h1>

  @if (session()->has('info'))
    <h5> {{ session('info') }}</h5>
  @endif

  <form class="" action="{{ route('usuarios.update',$user->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Name">
      {!! $errors->first('name','<span class="error">:message</span>') !!}
      <br>
      <input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="Email">
      {!! $errors->first('email','<span class="error">:message</span>') !!}
      <br>

      <input class="btn btn-primary" type="submit" name="" value="Send">
  </form>

@stop
