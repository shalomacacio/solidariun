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
                <label for="category">Categoria</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Categoria">
              </div>

              <div class="form-group">
                <label for="title">Titulo da Campanha</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="eg. John Doe">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="eg. info@uicookies.com">
              </div>
              <div class="form-group">
                <label for="goal">Meta em R$ </label>
                <input type="text" class="form-control" id="goal" name="goal" placeholder="1000.00">
              </div>
            </div>

            <div class="col-md-6 col-md-push-1 probootstrap-animate">
             <div class="form-group">
                <label for="description_short">Breve Descrição</label>
                <textarea cols="5" rows="3" class="form-control" id="description_short" name="description_short" placeholder="eg. This donation is for the children who needs food."></textarea>
              </div>

              <div class="form-group">
                <label for="description_full">Descriçao Completa</label>
                <textarea rows="9" class="form-control" id="description_full" name="description_full" placeholder="eg. This donation is for the children who needs food."></textarea>
              </div>
            </div>

            <div class="col-md-6 col-md-push-1 probootstrap-animate">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Criar Campanha">
                </div>
            </div>
            </form>
        </div>
        </div>
      </section>
@endsection