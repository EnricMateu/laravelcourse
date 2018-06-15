@extends('layout')

@section('content')


  @if(session()->has('flash'))
    {{ session()->get('flash') }}
  @endif

  <h1>Todos los mensajes</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>email</th>
        <th>Mensaje</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($messages as $message)
        <tr>
          <td>{{ $message->id }}</td>
          <td>
            <a href=" {{ route('mensajes.show',$message->id) }} ">
              {{ $message->name }}
            </a>
          </td>
          <td>{{ $message->email }}</td>
          <td>{{ $message->mensaje }}</td>
          <td>

            <a class="btn btn-info btn-xs" href="{{ route('mensajes.edit',$message->id)}}"> Edit </a>
            <form class="" action="{{ route('mensajes.destroy',$message->id) }}" method="post">
              {{ method_field('delete') }}
              {{ csrf_field() }}
              <button class="btn btn-danger btn-xs" type="submit" name="button">Eliminar</button>
            </form>

          </td>
        </tr>
       @endforeach
    </tbody>
  </table>

@stop
