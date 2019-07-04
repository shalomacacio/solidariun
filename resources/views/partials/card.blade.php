
<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
  <div class="probootstrap-image-text-block probootstrap-cause">
    <figure>
        <a href="{{ route('campanhas.show', $campanha->id) }}"><img src="{{ url("storage/img/campanha/{$campanha->img}") }}" alt="img-campanha" class="img-responsive" width="600" height="303"></a>
    </figure>
    <div class="probootstrap-cause-inner">
      <div class="progress">
        @if($campanha->percent < 100)
            <div class="progress-bar progress-bar-s2"  data-percent="{{$campanha->percent}}"></div>
        @else
            <div class="progress-bar"  style="width:100%;height:20px">SUPEROU A ESPECTATIVA {{$campanha->percent}} %</div>
       @endif
      </div>

      <div class="row mb30">
        <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised " >Arrecadado: <span>R$ <br/> {{ $campanha->arrecadado }}</span></div>
        <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Meta: <span>R$ <br/> {{ $campanha->meta }}</span></div>
      </div>

      <div class="text-center">
        <h2><a href="{{ route('campanhas.show', $campanha->id) }}">{{ isset($campanha->title)?$campanha->title: null }}</a></h2>
      </div>
      <div class="probootstrap-date"><i class="icon-calendar"></i>Faltam {{ isset($campanha->tempo)?$campanha->tempo: null }}</div>
      <p><div>{{ isset($campanha->description_short)? $campanha->description_short : null }}</div></p>
      <div class="text-center"><p><a href="{{ route('payment', $campanha->id) }}" class="btn btn-primary btn-lg btn-block"> Doar !</a></p></div>
    </div>
  </div>
</div>


