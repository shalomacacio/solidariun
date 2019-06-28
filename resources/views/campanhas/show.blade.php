@extends('layouts.website')

@section('content')

@include('partials.space')

  <section class="probootstrap-section">
        <div class="container">

          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>{{ $campanha->title }}</h2>
                <p>{{ $campanha->description_short }}</p>
            </div>
          </div>
          <div class="row probootstrap-gutter60">
            <div class="background_white  col-md-8 col-sm-8 probootstrap-animate">
                    <br/>
                    <br/>
              <div class="row">
                <div class="col-md-12 order-md-1">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="1007" height="496" src="{{ $campanha->movie }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <p>{{ $campanha->description }}

              <div class="row">
                <div class="col-md-6">
                  <p><a href="img/img_sq_6.jpg" class="image-popup"><img src="{{ url("storage/img/campanha/{$campanha->img}") }}" alt="img-campanha" class="img-responsive"></a></p>
                </div>
                <div class="col-md-6">
                  <p><a href="img/img_sq_6.jpg" class="image-popup"><img src="{{ url("storage/img/campanha/{$campanha->img}") }}" alt="img-campanha" class="img-responsive"></a></p>
                    </div>
              </div>
              <p><a href="{{ route('payment', $campanha->id) }}" class="btn btn-primary btn-block">Solidarizar-se !</a></p>
            </div>
            @include('partials.card')
          </div>
        </div>
      </section>

@endsection
