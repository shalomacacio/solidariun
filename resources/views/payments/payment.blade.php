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
                        <div class="col-md-6  probootstrap-animate">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="col-md-6 probootstrap-animate">
                            <div class="form-group">
                                <label for="senderEmail">Email:</label>
                                <input type="text" class="form-control" id="senderEmail" name="senderEmail">
                            </div>
                        </div>

                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="creditCardHolderBirthDate">Data de Nascimento:</label>
                                <input type="date" class="form-control" id="creditCardHolderBirthDate" name="creditCardHolderBirthDate">
                            </div>
                        </div>

                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="senderPhone">Celular:</label>
                                <input type="text" class="form-control" id="senderPhone" name="senderPhone">
                            </div>
                        </div>

                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="senderCPF">CPF:</label>
                                <input type="text" class="form-control" id="senderCPF" name="senderCPF">
                            </div>
                        </div>
                        <div class="col-md-6 probootstrap-animate">
                            <div class="form-group">
                                <label for="photo">Foto:</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                        </div>

                        <div class="col-md-6 probootstrap-animate">
                            <div class="form-group">
                                <label for="itemAmount">Valor:</label>
                                <input type="text" class="form-control" id="itemAmount" name="itemAmount">
                            </div>
                        </div>


                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="senderCPF">Forma de Doação:</label>
                                <div class="custom-control custom-radio">
                                    <input id="boleto" name="paymentMethod" type="radio" value="boleto" class="custom-control-input" required>
                                    <label class="custom-control-label"  for="boleto">Boleto</label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input id="credito" name="paymentMethod" type="radio" value="creditCard" class="custom-control-input"  required>
                                    <label class="custom-control-label"  for="credito">Cartão de crédito</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 probootstrap-animate">
                            <div class="form-group">
                                <label for="senderName">Titular do Cartão:</label>
                                <input type="text" class="form-control" id="senderName" name="senderName">
                            </div>
                            <div class="form-group">
                                <label for="cardNumber">Numero do Cartão:</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                            </div>

                            <div class="col-md-4 probootstrap-animate">
                                <div class="form-group"">
                                    <div class="card-operator ">
                                        <input id="brand" name="brand" type="radio" value="visa" class="custom-control-input"  required>
                                        <label class="custom-control-label"  for="brand"><img alt="Visa" src="{{ url('storage/img/brand/visa.png') }}"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 probootstrap-animate">
                                <div class="form-group"">
                                    <div class="card-operator">
                                        <input id="brand" name="brand" type="radio" value="master" class="custom-control-input"  required>
                                        <label class="custom-control-label"  for="brand"><img alt="Maste" src="{{ url('storage/img/brand/master.png') }}"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 probootstrap-animate">
                                <div class="form-group"">
                                    <div class="card-operator">
                                        <input id="brand" name="brand" type="radio" value="elo" class="custom-control-input"  required>
                                        <label class="custom-control-label"  for="brand"><img alt="Elo" src="{{ url('storage/img/brand/elo.png') }}"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-3 probootstrap-animate">
                            <div class="form-group">
                                <label for="expirationMonth">Mês:</label>
                                <input type="text" class="form-control" id="expirationMonth" name="expirationMonth">
                            </div>
                        </div>

                        <div class="col-md-3 probootstrap-animate">
                            <div class="form-group">
                                <label for="expirationYear">Ano:</label>
                                <input type="text" class="form-control" id="expirationYear" name="expirationYear">
                            </div>
                        </div>

                        <div class="col-md-2 probootstrap-animate">
                            <div class="form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" class="form-control" id="cvv" name="cvv">
                            </div>
                        </div>

                        {{-- <input id="user_id" name="user_id" type="hidden" value="{{Auth::user()->id}}"> --}}
                        <input type="text" class="form-control" id="creditCardToken" name="creditCardToken">
                        <input type="hidden" class="form-control" id="senderHash" name="senderHash">
                        <div class="col-md-12 probootstrap-animate">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Contribuir </button>
                                <button type="button" onclick="cardToken()" class="btn btn-primary">pgar codigo </button>
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
              //console.log(hash);
          }

          function cardToken(){
            PagSeguroDirectPayment.createCardToken({
                cardNumber: $("#cardNumber").val(), // Número do cartão de crédito
                brand: $("#brand").val(), // Bandeira do cartão
                cvv: $("#cvv").val(), // CVV do cartão
                expirationMonth: $("#expirationMonth").val(), // Mês da expiração do cartão
                expirationYear: $("#expirationYear").val(), // Ano da expiração do cartão, é necessário os 4 dígitos.
                success: function(response) {
                    console.log(response['brand'])
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


