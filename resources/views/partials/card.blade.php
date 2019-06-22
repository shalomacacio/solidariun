
<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate" data-animate-effect="fadeIn">
  <div class="probootstrap-image-text-block probootstrap-cause">
    <figure>
      <img src="{{ url("storage/img/campanha/{$campanha->img}") }}" alt="img-campanha" class="img-responsive" width="600" height="303">
    </figure>
    <div class="probootstrap-cause-inner">
      <div class="progress">
      <div class="progress-bar progress-bar-s2" data-percent="{{$campanha->percent}}"></div>
      </div>

      <div class="row mb30">
        <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-raised">Arrecadado: <span>${{ $campanha->reached }}</span></div>
        <div class="col-md-6 col-sm-6 col-xs-6 probootstrap-goal">Meta: <span>${{ $campanha->goal }}</span></div>
      </div>

      <h2><a href="{{ route('campanhas.show', $campanha->id) }}">{{ isset($campanha->title)?$campanha->title: null }}</a></h2>
      <div class="probootstrap-date"><i class="icon-calendar"></i>Faltam {{ isset($campanha->tempo)?$campanha->tempo: null }}</div>

      <p><div>{{ isset($campanha->description_short)? $campanha->description_short : null }}</div></p>
      <p>
          <a href="{{ route('payment', $campanha->id) }}" class="btn btn-primary btn-primary">Solidarizar-se !</a>

      </p>

    </div>
  </div>
</div>
