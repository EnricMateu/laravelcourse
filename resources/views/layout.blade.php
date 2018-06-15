<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" charset="utf-8"></script>
    <title>Mi Sitio - {{ request()->url()}}</title>
  </head>
  <body>
    <header>

      <?php function activeMenu($url){
        return request()->is($url) ? 'active' : '';
      } ?>


      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item {{ activeMenu('/') }}">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item {{ activeMenu('mensajes/create') }}">
              <a class="nav-link"href="{{ route('mensajes.create') }}">Contactanos</a>
            </li>
            @if(auth()->guest())
              <li class="nav-item {{ activeMenu('login') }}">
                 <a class="nav-link" href="/login">Login</a>
              </li>
            @else()
              <li class="nav-item {{ activeMenu('mensajes') }}">
                <a class="nav-link" href="{{ route('mensajes.index') }}">Mensajes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Cerrar Session de  {{ auth()->user()->name }}</a>
              </li>
            @endif




            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>


          </ul>
        </div>
      </nav>



    </header>

    <div class="container">

      @yield('content')

      <footer>Copyright {{ date('Y') }}</footer>

    </div>



  </body>
</html>
