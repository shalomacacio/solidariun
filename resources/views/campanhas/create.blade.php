@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">

    <div class="row">
        <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
            <h2>Criar uma Campanha </h2>
            <p class="lead">Preencha corretamente todos os campos e divulgue entre seus amigos e redes sociais!</p>
        </div>
    </div>


    <div class="row">
      <form class="probootstrap-form" method="POST" action="{{ route('campanhas.store') }}" enctype="multipart/form-data" >
        @csrf
        <div class="col-md-5 probootstrap-animate">

          <div class="form-group">
            <label for="category_id">Categoria</label>
                <select  id="category_id" class="form-control" name="category_id"  required >
                    <option value="1">Solidariedade</option>
                    <option value="2">Filantropia</option>
                    <option value="3">Cultura</option>
                    <option value="4">Negócio</option>
                    <option value="5">Esporte</option>
                </select>
          </div>

          <div class="form-group">
            <label for="title">Titulo da Campanha</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>

          <div class="form-group">
            <label for="description">Descrição (min:200 caracteres) <span id="cont">  </span> </label>
            <textarea id="description" rows="5" type="text" class="form-control" name="description" required></textarea>
          </div>

        </div>

        <div class="col-md-6 col-md-push-1 probootstrap-animate">

          <div class="form-group">
              <label for="goal">Meta em R$:</label>
              <input type="text" class="form-control" id="goal" name="goal"  data-symbol="R$ " data-thousands="." data-decimal="," />
          </div>

          <div class="form-group">
              <label for="dt_final">Finaliza em:</label>
              <input type="date" class="form-control" id="dt_final" name="dt_final">
          </div>

          <div class="form-group">
                <label for="img">Imagem:</label>
                <input type="file" class="form-control" id="img" name="img">
          </div>

            <div class="form-group">
                <label for="movie">Link do Vídeo:</label>
                <input type="text" class="form-control" id="movie" name="movie" placeholder="www.youtube.com/...">
            </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block"> Criar Campanha </button>
          </div>

          <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}">
        </div>
      </form>
    </div>
  </div>
</section>

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript" src="/pagseguro/javascript"></script>
<script src="{{asset('js/jquery.maskMoney.js')}}"></script>

<script>
    $("#goal").maskMoney();
</script>

@endsection
