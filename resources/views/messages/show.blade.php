@extends('layout')

@section('content')
  <h1>Mensaje</h1>

  <p> Enviado por: {{ $message->name }} - {{ $message->email }}</p>

  <p> {{ $message->mensaje }}</p>

  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif


@stop
