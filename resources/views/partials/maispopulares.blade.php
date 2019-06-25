<section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
              <h2>Causas Mais Populares </h2>
              <p class="lead">Divulgue sua causa entre seus familiares, amigos, nas redes sociais e entre pra esse time</p>
            </div>
          </div>
          <div class="row">
            @foreach ($campanhas as $campanha)
                @include('partials.card')
            @endforeach
              <div class="clearfix visible-sm-block visible-xs-block"></div>
          </div>
        </div>

        <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                        <p class="probootstrap-animate fadeInUp probootstrap-animated"><a href="{{ route('campanhas.index') }}" class="btn btn-ghost btn-lg"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ver Todas</font></font></a></p>
                    </div>
                </div>
        </div>
      </section>
