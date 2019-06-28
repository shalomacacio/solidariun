@extends('layouts.website')

@section('content')

@include('partials.space')
 <section class="probootstrap-section">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                    <h2>Todas as Campanhas </h2>
                    <p class="lead">Divulgue sua causa entre seus familiares, amigos, nas redes sociais e entre pra esse time</p>
                </div>
            </div>

          <div class="row">
            @foreach ($campanhas as $campanha)
                @include('partials.card')
                @if(($loop->iteration%3) == 0 )
                <div class="clearfix visible-lg-block visible-md-block"></div>
                @endif
            @endforeach
            <!-- SPACE -->

            <!-- END SPACE -->
          </div>
        </div>
      </section>

@endsection
