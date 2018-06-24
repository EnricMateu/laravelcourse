@extends('layout')

@section('content')
  <h1>Contact</h1>

  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif


  <form  action="{{ route('mensajes.store') }}" method="post">
      {{ csrf_field() }}
      @include('messages.form')
  </form>
@stop
