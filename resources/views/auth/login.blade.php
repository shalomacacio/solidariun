@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">

    <div class="row">

      <form class="probootstrap-form" method="POST" action="{{ route('auth') }}" >
        @csrf
        <div class="col-md-5 jumbotron probootstrap-animate">
          <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>ENTRAR</h2>
                <p class="lead">Entre com login e senha ou realize seu cadastro</p>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

          <div class="form-group">
            <a href="{{ route('users.create') }}" class="btn btn-black btn-lg ">CADASTRE-SE</a>

            <button type="submit" class="btn btn-primary btn-lg"> ENTRAR</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</section>
@endsection
