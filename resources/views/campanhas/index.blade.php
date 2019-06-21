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
