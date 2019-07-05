@extends('layouts.website')

@section('content')

@include('partials.space')

  <section class="probootstrap-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>Minhas Campanhas</h2>
                <p>página de administração de campanhas</p>
            </div>
          </div>
          <div class="row probootstrap-gutter60">
            <div class="background_white  col-md-12 col-sm-12 probootstrap-animate">
                <table class="table">
                    <thead>
                        <th>Img</th>
                        <th>Campanha</th>
                        <th>Arrecadado</th>
                        <th>Meta</th>
                        <th>Status</th>
                        <th>Criada em </th>
                        <th>Ações </th>
                    </thead>
                    <tbody>
                        @foreach($campanhas as $campanha)
                        <tr>
                          <td><img src="{{ url("storage/img/campanha/{$campanha->img}") }}" alt="img-campanha" class="img-responsive" width="60" height="30"></td>
                          <td>{{$campanha->title}}</td>
                          <td>{{$campanha->arrecadado}}</td>
                          <td>{{$campanha->meta}}</td>
                          <td>{{$campanha->status}}</td>
                          <td>{{$campanha->created_at}}</td>
                          <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('campanhas.edit', $campanha->id) }}"> Editar    </i></a>
                            <a class="btn btn-sm btn-success" href="{{ route('campanhas.edit', $campanha->id) }}"> Encerrar  </i></a>
                            <a class="btn btn-sm btn-danger" href="{{ route('campanhas.edit', $campanha->id) }}">  Cancelar  </i></a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </section>
@endsection
