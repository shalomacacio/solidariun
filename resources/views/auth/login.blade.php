@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">

    <div class="row">

      <div class="jumbotron col-md-4 col-md-push-1 probootstrap-animate">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>CADASTRE-SE</h2>
                <p class="lead">Cadastre seus dados </p>
            </div>
            <form class="  probootstrap-form" method="POST" action="{{ route('users.store') }}" >
            @csrf
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
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirmar senha</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-black btn-lg btn-bock "> CADASTRE-SE</button>
            </div>
        </form>
      </div>

      <div class="jumbotron col-md-4 col-md-push-4  probootstrap-animate">
            <form class="probootstrap-form" method="POST" action="{{ route('auth') }}" >
                @csrf
              <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                    <h2>ENTRAR</h2>
                    <p class="lead">Entre com login e senha !</p>
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
                {{-- <a href="{{ route('users.create') }}" class="btn btn-black btn-lg ">CADASTRE-SE</a> --}}
                <button type="submit" class="btn btn-primary btn-lg btn-bock"> ENTRAR</button>
              </div>
            </form>
            </div>
    </div>
  </div>
</section>
@endsection
