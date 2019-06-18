@extends('layouts.website')

@section('content')
<!-- <section class="probootstrap-section">
        <div class="container">
          <div class="row">
          </div>
        </div>
</section> -->

@include('partials.banner')
 <section class="probootstrap-section">
        <div class="container">
          <div class="row">
          @foreach ($campanhas as $campanha)
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block probootstrap-cause">
                <figure>
                  <img src="../img/campanha/{{ $campanha->img}}" alt="img-campanha" class="img-responsive" width="600" height="303">
                </figure>
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                    <div class="progress-bar progress-bar-s2" data-percent="{{ $campanha->percentual() }}"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Arrecadado: <span>${{ $campanha->reached }}</span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Meta: <span>${{ $campanha->goal }}</span></div>
                  </div>

                  <h2><a href="#">{{ $campanha->title }}</a></h2>
                  <div class="probootstrap-date"><i class="icon-calendar"></i> 2 hours remaining</div>

                  <p><div>{{ $campanha->description }}</div></p>
                  <p>
                      <a href="{{ route('campanhas.show', $campanha->id) }}" class="btn btn-primary ">Ver</a>

                      <a href="#" class="btn btn-primary btn-black">Solidarizar-se !</a>
                  </p>

                </div>
              </div>
            </div>
            @endforeach
            <!-- SPACE -->
            <div class="clearfix visible-lg-block visible-md-block"></div>
            <!-- END SPACE -->
          </div>
        </div>
      </section>

      <section class="probootstrap-half">
        <div class="image">
          <div class="image-bg">
            <img src="../img/site/img_sq_5_big.jpg" alt="Free Bootstrap Template by uicookies.com">
          </div>
        </div>
        <div class="text">
          <div class="probootstrap-animate">
            <h3>História de Sucesso </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur sunt excepturi dicta ex, placeat ab esse, iure harum eaque fuga asperiores distinctio amet temporibus enim illum molestiae neque ad similique possimus repellendus velit! Quaerat nihil nemo, aliquam consectetur debitis illum. Excepturi cum, quaerat minus odit dolorem recusandae, debitis reprehenderit voluptate?</p>
            <p><a href="#" class="btn btn-primary btn-lg">Read More</a></p>
          </div>
        </div>
      </section>
@endsection
