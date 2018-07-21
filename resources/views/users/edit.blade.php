@extends('layout')

@section('content')

  <h1>Editar Usuario</h1>

  @if (session()->has('info'))
    <h5> {{ session('info') }}</h5>
  @endif

  <form class="" action="{{ route('usuarios.update',$user->id) }}" method="post">
      {{ method_field('PUT') }}

      @include('users.form')
      <input class="btn btn-primary" type="submit" name="" value="Send">

  </form>

@stop
