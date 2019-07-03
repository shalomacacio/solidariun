@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">
    <div class="row">

        <div class="col-md-5 jumbotron probootstrap-animate">
          <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>COMPLETE SEU CADASTRO</h2>
                <p class="lead">Estamos muito felizes em ver você por aqui. Conte-nos sobre você!</p>
          </div>
        </div>

        <div class="col-md-6 col-md-push-1 probootstrap-animate">

        <h4>{{$user->name}}</h4>
        <ul class="probootstrap-contact-info">
          <li><i class="icon-email"></i><span>{{$user->email}}</span></li>
          <li><i class="icon-phone"></i><span>+123 456 7890</span></li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection
