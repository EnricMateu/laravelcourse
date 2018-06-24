@extends('layout')

@section('content')
  <h1>Usuarios</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Role</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        @foreach ($user->roles as $role)
          <td>{{ $role->display_name }}</td>
        @endforeach
        <td></td>
      </tr>
      <td>
        <a class="btn btn-info btn-xs" href="{{ route('usuarios.edit',$user->id)}}"> Edit </a>
        <form class="" action="{{ route('usuarios.destroy',$user->id) }}" method="post">
          {{ method_field('delete') }}
          {{ csrf_field() }}
          <button class="btn btn-danger btn-xs" type="submit" name="button">Eliminar</button>
        </form>
      </td>
      @endforeach
    </tbody>
  </table>

@stop
