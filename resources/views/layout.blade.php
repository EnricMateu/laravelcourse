<style >
  .active{
    text-decoration: none;
    color: green;
  }

  .error{
    color:red;
    font-size: 12px;
  }
</style>

<h1> {{ request()->url()}}</h1>

<?php function activeMenu($url){
  return request()->is($url) ? 'active' : '';
} ?>
<nav>
  <ul>
    <li> <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a> </li>
    <li> <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactanos</a> </li>
    @if(auth()->guest())
      <li> <a class="{{ activeMenu('login') }}" href="/login">Login</a> </li>
    @else()
      <li> <a class="{{ activeMenu('mensajes') }}" href="{{ route('mensajes.index') }}">Mensajes</a> </li>
      <li> <a class="" href="/logout">Cerrar Session de  {{ auth()->user()->name }}</a> </li>
    @endif


  </ul>
</nav>

@yield('content')
