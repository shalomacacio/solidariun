<nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('site') }}" title="uiCookies:Enlight">Solidariun</a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="{{ route('site') }}">Home</a></li>
              <li><a href="{{ route('campanhas.index') }}">Campanhas</a></li>
              @if(Auth::check())
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{ Auth::user()->name }}</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Meus Dados</a></li>
                  <li><a href="#">Minhas Campanhas</a></li>
                  <li><a href="{{ route('logout') }}">Sair</a></li>
                </ul>
              </li>
              @endif
              <li class="probootstra-cta-button last"><a href="{{ route('campanhas.create') }}" class="btn btn-primary">Criar Campanha</a></li>
            </ul>
          </div>
        </div>
      </nav>
