@extends('layouts.website')

@section('content')

@include('partials.space')
<section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter60">

            @include('partials.card')

            <div class="col-md-8 col-sm-8 probootstrap-animate">
              <div class="row">
                    <form class="probootstrap-form" method="POST" action="{{ route('payments.store') }}" >
                            @csrf
                            <div class="col-md-5 probootstrap-animate">

                              <div class="form-group">
                                <label for="title">Titulo da Campanha</label>
                                <input type="text" class="form-control" id="title" name="title">
                              </div>

                              {{-- <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}"> --}}

                            </div>
                          </form>

              </div>
            </div>

          </div>
        </div>
      </section>
@endsection


