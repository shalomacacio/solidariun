@extends('layouts.website')

@section('content')

@include('partials.space')

  <section class="probootstrap-section">
        <div class="container">

          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>{{ $campanha->title }}</h2>
                <p>{{ $campanha->description_short }}</p>
                <div class="fb-share-button" data-href="http://www.solidariun.com/campanhas/{{$campanha->id}}" data-layout="button_count" data-size="large">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsolidariun.com%2Fcampanhas%2F{{$campanha->id}}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a>
                </div>
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
              <p><a href="{{ route('payment', $campanha->id) }}" class="btn btn-primary btn-block">Solidarizar-se !</a></p>
            </div>
            @include('partials.card')
          </div>
        </div>
      </section>

      @push('headers')
      <meta property="fb:app_ids"     content="648912868869156" />
      <meta property="og:type"        content="website" />
      <meta property="og:url"         content="http://www.solidariun.com/campanhas/{{$campanha->id}}" />
      <meta property="og:title"       content="{{$campanha->title}} " />
      <meta property="og:description" content="{{$campanha->description_short}}" />
      <meta property="og:image"       content="http://solidariun.com/storage/img/campanha/{{$campanha->img}}" />
      <meta property="og:site_name"   content="Solidariun | solidariun.com"/>
      @endpush

      @push('scripts')
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
      @endpush

@endsection
