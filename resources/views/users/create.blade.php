@extends('layout')

@section('content')
  <h1>Crear usuario</h1>

  <form class="" action="{{ route('usuarios.store') }}" method="post">
      @include('users.form',['user' => new App\User])
      <input class="btn btn-primary" type="submit" name="" value="Guardar">

  </form>
@stop
