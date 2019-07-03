<nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('site') }}" title="logo">Solidariun</a>
        </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('site') }}">Home</a></li>

              <li class="dropdown">
                  <a href="{{ route('campanhas.index') }}">Campanhas</a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('campanhas.create') }}">Criar Campanha</a></li>
                  </ul>
                </li>
            @guest
                <li class="probootstra-cta-button last"><a href=" {{ route ('login')}} " class="btn btn-ghost">Login</a></li>

              @else
              <li class="dropdown">
                    <a href="{{ route('login') }}">{{ Auth::user()->name }}</a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('users.show', Auth::user()->id)}}">Meus Dados</a></li>
                  <li><a href="#">Minhas Campanhas</a></li>
                  <li><a href="{{ route('logout') }}">Sair</a></li>
                </ul>
              </li>
            @endguest

            </ul>
          </div>
        </div>
      </nav>
