@extends('layouts.website')
@section('content')
@include('partials.space')
<section class="probootstrap-section">
  <div class="container">
    <div class="row">
      <form class="probootstrap-form" method="POST" action="{{ route('campanhas.store') }}" >
        @csrf
        <div class="col-md-5 probootstrap-animate">

          <div class="form-group">
            <label for="category_id">Categoria</label>
                <select  id="category_id" class="form-control" name="category_id"  required >
                    <option value="1">Contribuição</option>
                    <option value="2">Filantropia</option>
                    <option value="3">Doença</option>
                </select>
          </div>

          <div class="form-group">
            <label for="title">Titulo da Campanha</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>

          <div class="form-group">
            <label for="description_short">Descrição Curta</label>
            <textarea id="description_short" rows="3" type="text" class="form-control" name="description_short" required></textarea>
          </div>

          <div class="form-group">
            <label for="description_full">Descrição Completa</label>
            <textarea id="description_full" rows="5" type="text" class="form-control" name="description_full" required></textarea>
          </div>

        </div>

        <div class="col-md-6 col-md-push-1 probootstrap-animate">

          <div class="form-group">
              <label for="goal">Meta em R$:</label>
              <input type="text" class="form-control" id="goal" name="goal">
          </div>

          <div class="form-group">
              <label for="dt_final">Finaliza em:</label>
              <input type="date" class="form-control" id="dt_final" name="dt_final">
          </div>

          <div class="form-group">
                <label for="img">Imagem:</label>
                <input type="text" class="form-control" id="img" name="img">
          </div>

            <div class="form-group">
                <label for="movie">Link do Vídeo:</label>
                <input type="text" class="form-control" id="movie" name="movie" placeholder="www.youtube.com/...">
            </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary"> Criar Campanha </button>
          </div>

          {{-- <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}"> --}}
          <input id="user_id" name="user_id" type="hidden" value="1">
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
