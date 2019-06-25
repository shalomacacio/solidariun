@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">
    <div class="row">
      <form class="probootstrap-form" method="POST" action="{{ route('auth') }}" >
        @csrf
        <div class="col-md-5 probootstrap-animate">

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
