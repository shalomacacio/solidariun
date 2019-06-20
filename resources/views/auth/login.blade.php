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
            <button type="submit" class="btn btn-primary"> Entrar</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</section>
@endsection
