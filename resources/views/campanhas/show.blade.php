@extends('layouts.website')

@section('content')
  @include('partials.banner')

  <section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter60">

            <div class="col-md-4 col-sm-4 probootstrap-animate" data-animate-effect="fadeIn">
              <div class="probootstrap-image-text-block probootstrap-cause">
                <figure>
                  <img src="../img/campanha/{{ $campanha->img}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive">
                </figure>
                <div class="probootstrap-cause-inner">
                  <div class="progress">
                    <div class="progress-bar progress-bar-s2" data-percent="{{ $campanha->percentual()}}"></div>
                  </div>

                  <div class="row mb30">
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Arrecadado: <span >${{ $campanha->reached}}</span></div>
                    <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Meta: <span >${{ $campanha->goal}}</span></div>
                  </div>
                  
                  <h2><a href="#">{{ $campanha->title}}</a></h2>
                  <div class="probootstrap-date"><i class="icon-calendar"></i> 2 hours remaining</div>  
                  
                  <p><a href="#" class="btn btn-primary btn-black">Donate Now!</a></p>
                </div>
              </div>
            </div>

            <div class="col-md-8 col-sm-8 probootstrap-animate">
              <h2>{{ $campanha->title }}</h2>
              <p>{{ $campanha->description }}</p> <!--  {{ $campanha->description_short }}  -->
              <div class="row">
                <div class="col-md-12 order-md-1">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="1007" height="496" src="{{ $campanha->movie }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
              <p>Odio soluta illo repudiandae aut aperiam dolor ipsam laboriosam, vero sit possimus minus quis, ducimus dolorum veritatis nulla facilis earum ex ab repellat quibusdam assumenda! Iusto saepe repellat doloribus in quisquam asperiores ea minus, ipsam aliquam at quam, deserunt velit eum pariatur animi suscipit quos necessitatibus molestias eaque. Voluptatibus natus accusantium at, minus quasi non, nesciunt ea illo atque necessitatibus?</p>
              <p>In pariatur mollitia, perspiciatis eum sequi minima vitae laborum aut praesentium obcaecati veritatis cum amet voluptas voluptates dolorem numquam, ex quibusdam neque esse. Ex asperiores delectus molestias illum nihil suscipit eaque placeat saepe dignissimos fuga dolore, consequuntur nisi totam id illo necessitatibus! Ducimus libero dolores soluta consequuntur maiores sapiente modi excepturi aliquid voluptate, corrupti, porro, possimus quas quod consequatur repellat.</p>
              <div class="row">
                <div class="col-md-6">
                  <p><a href="img/img_sq_6.jpg" class="image-popup"><img src="img/img_sq_2.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a></p>
                </div>
                <div class="col-md-6">
                  <p><a href="img/img_sq_6.jpg" class="image-popup"><img src="img/img_sq_3.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></a></p>
                </div>
              </div>
              <p>Odio soluta illo repudiandae aut aperiam dolor ipsam laboriosam, vero sit possimus minus quis, ducimus dolorum veritatis nulla facilis earum ex ab repellat quibusdam assumenda! Iusto saepe repellat doloribus in quisquam asperiores ea minus, ipsam aliquam at quam, deserunt velit eum pariatur animi suscipit quos necessitatibus molestias eaque. Voluptatibus natus accusantium at, minus quasi non, nesciunt ea illo atque necessitatibus?</p>
              <p>In pariatur mollitia, perspiciatis eum sequi minima vitae laborum aut praesentium obcaecati veritatis cum amet voluptas voluptates dolorem numquam, ex quibusdam neque esse. Ex asperiores delectus molestias illum nihil suscipit eaque placeat saepe dignissimos fuga dolore, consequuntur nisi totam id illo necessitatibus! Ducimus libero dolores soluta consequuntur maiores sapiente modi excepturi aliquid voluptate, corrupti, porro, possimus quas quod consequatur repellat.</p>
              <p><a href="#" class="btn btn-black btn-lg">Donate Now</a></p>

            </div>

          </div>
        </div>
      </section>

@endsection
