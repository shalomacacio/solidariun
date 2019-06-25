@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">
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
              <input type="text" class="form-control" data-mask="#.##0,00" id="goal" name="goal">
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
            <button type="submit" class="btn btn-primary"> Criar Campanha </button>
          </div>

          <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}">
        </div>
      </form>
    </div>
  </div>
</section>

@push('scripts')
{{-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript" src="/pagseguro/javascript"></script>

<script>

    $(document).ready(function(){

        data-mask="(00) 0000-0000"

        // $('#goal').mask("#.##0,00");
        // $('.date').mask('00/00/0000');
        // $('.time').mask('00:00:00');
        // $('.date_time').mask('00/00/0000 00:00:00');
        // $('#cep').mask('00000-000');
        // $('.phone').mask('0000-0000');
        // $('.phone_with_ddd').mask('(00) 0000-0000');
        // $('.phone_us').mask('(000) 000-0000');
        // $('.mixed').mask('AAA 000-S0S');
        // $('.cpf').mask('000.000.000-00', {reverse: true});
        // $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        // $('.money').mask('000.000.000.000.000,00', {reverse: true});
        // $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        //     translation: {
        //         'Z': {
        //             pattern: /[0-9]/, optional: true
        //         }
        //     }
        // });
        // $('.ip_address').mask('099.099.099.099');
        // $('.percent').mask('##0,00%', {reverse: true});
        // $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        // $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        // $('.fallback').mask("00r00r0000", {
        //     translation: {
        //         'r': {
        //             pattern: /[\/]/,
        //             fallback: '/'
        //         },
        //         placeholder: "__/__/____"
        //     }
        // });
        // $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
    });





</script>
@endsection
