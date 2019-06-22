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
                                    <label for="senderHash">Hash</label>
                                    <input type="text" class="form-control" id="senderHash" name="senderHash">
                                </div>

                                <div class="form-group">
                                    <label for="creditCardToken">Token</label>
                                    <input type="text" class="form-control" id="creditCardToken" name="creditCardToken">
                                </div>

                              {{-- <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}"> --}}
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Criar Campanha </button>
                              </div>

                            </div>
                          </form>

              </div>
            </div>

          </div>
        </div>
      </section>

      @push('scripts')
      <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="/pagseguro/javascript"></script>



      <script>
          window.onload =  function() {
              var hash = PagSeguroDirectPayment.getSenderHash();
               $('#senderHash').val(hash);
              PagSeguroDirectPayment.setSessionId('{{ PagSeguro::startSession() }}');
              console.log(hash);
          }

          function cardToken(){
              PagSeguroDirectPayment.createCardToken({
                  cardNumber: '4111111111111111', // Número do cartão de crédito
                  brand: 'visa', // Bandeira do cartão
                  cvv: '123', // CVV do cartão
                  expirationMonth: '12', // Mês da expiração do cartão
                  expirationYear: '2030', // Ano da expiração do cartão, é necessário os 4 dígitos.
                  success: function(response) {
                      //console.log(response)
                      $('#creditCardToken').val(response['card']['token']);
                          // Retorna o cartão tokenizado.
                  },
                  error: function(response) {
                              // Callback para chamadas que falharam.
                              console.log(response)
                  },
                  complete: function(response) {
                          // Callback para todas chamadas.
                          console.log(response)
                  }
              });
          }
      </script>
@endsection


