@extends('layouts.website')

@section('content')

@include('partials.space')

  <section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter60">

            @include('partials.card')

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
              <p><a href="{{ route('campanhas.create') }}" class="btn btn-black btn-lg">Doar agora</a></p>

            </div>

          </div>
        </div>
      </section>

@endsection
