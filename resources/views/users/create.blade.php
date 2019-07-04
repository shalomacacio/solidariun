@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">

    <div class="row">
      <form class="  probootstrap-form" method="POST" action="{{ route('users.store') }}" >
        @csrf
        <div class="col-md-5 jumbotron probootstrap-animate">

          <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>CADASTRE-SE</h2>
                <p class="lead">Estamos muito felizes em ver você por aqui. Conte-nos sobre você!</p>
          </div>

          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <div class="form-group">
            <label for="password-confirm">Confirmar senha</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block"> Criar Usuário </button>
          </div>

        </div>
      </form>
    </div>
  </div>
</section>
@endsection
