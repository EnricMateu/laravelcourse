@extends('layout')


@section('content')
  <ul>
    @foreach($consolas as $consola)
      <li>{{ $consola }}</li>
    @endforeach
  </ul>
@stop
