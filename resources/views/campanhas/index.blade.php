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
                @include('partials.card')
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
