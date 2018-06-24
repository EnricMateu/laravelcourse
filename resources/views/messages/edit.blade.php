@extends('layout')

@section('content')
  <h1>Editar Mensaje</h1>


  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif


    <form class="" action="{{ route('mensajes.update',$message->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('messages.form',['btnText' => 'Actualizar'])
    </form>


@stop
