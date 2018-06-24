@extends('layout')

@section('content')
  <h1> Usuario {{ $user->name }}</h1>

  <table>
    <tr>
      <th>Nombre:</th>
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <th>Email:</th>
      <td>{{ $user->email }}</td>
    </tr>
  </table>

  @can('edit',$user)
    <a href="{{route('usuarios.edit',$user->id)}}" class="btn btn-info" type="button" name="button">Editar</a>
  @endcan

  @can('destroy',$user)
  <form class="" action="{{ route('usuarios.destroy',$user->id) }}" method="post">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <button class="btn btn-danger btn-xs" type="submit" name="button">Eliminar</button>
  </form>
  @endcan
@stop
