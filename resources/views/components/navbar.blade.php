<nav>
    <div class="container-fluid bg-dark d-block text-center">
      <p class="m-0 p-3 text-white logo text-logo">The Aulab Post</p>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          
          <li class="nav-item mx-3">
            <a class="nav-link" href="{{route('article.create')}}">Pubblica Articolo</a>
          </li>

          @guest
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Benvenuto
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
              </ul>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::user()->is_admin)
                  <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard amministratore</a></li>
                @endif
                @if(Auth::user()->is_revisor)
                  <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard revisore</a></li>
                @endif

                <li><a class="dropdown-item" href="">Profilo</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.querySelector('#form-logout').submit()">Logout</a>
                  <form id="form-logout" method="POST" action="{{route('logout')}}" class="d-none"> @csrf </form>
                </li>
              </ul>
            </li>
          @endguest
        </ul>

        <div class="search-container">
          <form action="{{route('article.search')}}" method="GET">
            <input class="search expandright form-control" id="searchright" type="search" name="query" placeholder="Cosa stai cercando?">
            <label class="buttonsrc searchbutton" for="searchright" type="submit"><span class="mglass">&#9906;</span></label>
          </form>
        </div>
      </div>
    </div>
</nav>