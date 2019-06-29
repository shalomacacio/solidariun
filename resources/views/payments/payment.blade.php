@extends('layouts.website')

@section('content')

@include('partials.space')
<section class="probootstrap-section">
        <div class="container">
          <div class="row probootstrap-gutter60">

            @include('partials.card')

            <div class="jumbotron col-md-8 col-sm-8 probootstrap-animate">
              <div class="row ">
                    <form class="probootstrap-form" method="POST" action="{{ route('payments.pay') }}" enctype="multipart/form-data" >
                    @csrf
                        <div class="col-md-12">
                            <label for="item_amount">Quero contribuir com:</label>
                            <div class="input-group mb-3">
                                    <div class="input-group-prepend" >
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input type="text" class="form-control"  id="item_amount" name="item_amount" data-symbol="R$ " data-thousands="." data-decimal="," placeholder="Digite o Valor ou  =>" required>
                                    <div class="input-group-append" >
                                        <button class="btn btn-primary btnAmount" type="button"  value="25,00">R$ 25</button>
                                        <button class="btn btn-primary btnAmount" type="button"  value="50,00">R$ 50</button>
                                        <button class="btn btn-primary btnAmount" type="button"  value="75,00">R$ 75</button>
                                        <button class="btn btn-primary btnAmount" type="button"  value="100,00">R$ 100</button>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6  probootstrap-animate">
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-6 probootstrap-animate">
                            <div class="form-group">
                                <label for="sender_email">Email:</label>
                                <input type="text" class="form-control" id="sender_email" name="sender_email" required>
                            </div>
                        </div>

                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="creditCardHolderBirthDate">Data de Nascimento:</label>
                                <input type="date" class="form-control" id="creditCardHolderBirthDate" name="creditCardHolderBirthDate" required>
                            </div>
                        </div>

                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="sender_phone">Celular:</label>
                                <input type="text" class="form-control" data-mask="(00) 00000-0000" id="sender_phone" name="sender_phone" required>
                            </div>
                        </div>

                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="sender_cpf">CPF:</label>
                                <input type="text" class="form-control" data-mask="000.000.000-00" id="sender_cpf" name="sender_cpf" required>
                            </div>
                        </div>

                        <div class="col-md-4 probootstrap-animate">
                            <div class="form-group">
                                <label for="senderCPF">Forma de Doação:</label>
                                <div class="custom-control custom-radio">
                                    <input id="boleto" onclick="sendHash()" name="payment_method" type="radio" value="boleto" class="custom-control-input" required>
                                    <label class="custom-control-label"  for="boleto">Boleto</label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input id="credito"  onclick="sendHash()"  name="payment_method" type="radio" value="creditCard" class="custom-control-input"  required>
                                    <label class="custom-control-label"  for="credito">Cartão de crédito</label>
                                </div>
                            </div>

                            <div >
                                <img src="{{ url("storage/img/site/logo_pagseguro.png") }}" alt="img-campanha" class="img-responsive" width="200" height="200">
                            </div>
                        </div>
                        <div id="card" hidden>
                            <div class="col-md-8 probootstrap-animate">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cardNumber">Numero do Cartão:</label>
                                        <input type="text" class="form-control" data-mask="0000000000000000" id="cardNumber" name="cardNumber">
                                    </div>
                                </div>

                                <div class="col-md-4 probootstrap-animate">
                                    <div class="form-group"">
                                        <div class="card-operator ">
                                            <input id="brand" name="brand" type="radio" value="visa" class="custom-control-input"  >
                                            <label class="custom-control-label"  for="brand"><img alt="Visa" src="{{ url('storage/img/brand/visa.png') }}"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 probootstrap-animate">
                                    <div class="form-group"">
                                        <div class="card-operator">
                                            <input id="brand" name="brand" type="radio" value="master" class="custom-control-input"  >
                                            <label class="custom-control-label"  for="brand"><img alt="Maste" src="{{ url('storage/img/brand/master.png') }}"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 probootstrap-animate">
                                    <div class="form-group"">
                                        <div class="card-operator">
                                            <input id="brand" name="brand" type="radio" value="elo" class="custom-control-input"  >
                                            <label class="custom-control-label"  for="brand"><img alt="Elo" src="{{ url('storage/img/brand/elo.png') }}"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 probootstrap-animate">

                                <div class="col-md-4 probootstrap-animate">
                                    <div class="form-group">
                                        <label for="expirationMonth">Mês:</label>
                                        <input type="text" class="form-control" data-mask="00" id="expirationMonth" name="expirationMonth">
                                    </div>
                                </div>

                                <div class="col-md-4 probootstrap-animate">
                                    <div class="form-group">
                                        <label for="expirationYear">Ano:</label>
                                        <input type="text" class="form-control" data-mask="0000"  id="expirationYear" name="expirationYear">
                                    </div>
                                </div>

                                <div class="col-md-4 probootstrap-animate">
                                    <div class="form-group">
                                        <label for="cvv">CVV:</label>
                                        <input type="text" onblur="cardToken()" class="form-control" data-mask="0000" id="cvv" name="cvv">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sender_name">Titular do Cartão:</label>
                                        <input type="text" class="form-control" id="sender_name" name="sender_name">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="campanha_id" name="campanha_id" value="{{$campanha->id}}">
                        <input type="hidden" class="form-control" id="campanha_title" name="campanha_title" value="{{$campanha->title}}">
                        <input type="hidden" class="form-control" id="creditCardToken" name="creditCardToken">
                        <input type="hidden" class="form-control" id="senderHash" name="senderHash">

                        <div class="col-md-4 "></div>
                        <div class="col-md-8 ">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"> Contribuir </button>
                            </div>
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
      </section>


    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ PagSeguro::getUrl()['javascript'] }}"></script>
        <script src="{{asset('js/jquery.maskMoney.js')}}"></script>

    <script>
            function sendHash(){
                var hash = $('#senderHash').val(PagSeguroDirectPayment.getSenderHash());
                PagSeguroDirectPayment.setSessionId('{{ PagSeguro::startSession() }}'); //PagSeguroRecorrente tem um método identico, use o que preferir neste caso, não tem diferença.
            };

            function cardToken(){
                PagSeguroDirectPayment.createCardToken({
                    cardNumber: $("#cardNumber").val(), // Número do cartão de crédito
                    brand: $("#brand").val(), // Bandeira do cartão
                    cvv: $("#cvv").val(), // CVV do cartão
                    expirationMonth: $("#expirationMonth").val(), // Mês da expiração do cartão
                    expirationYear: $("#expirationYear").val(), // Ano da expiração do cartão, é necessário os 4 dígitos.
                    success: function(response) {
                        // console.log(response['brand'])
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
            };

            $('input[name="payment_method"]').change(function () {
                if ($('input[name="payment_method"]:checked').val() === "creditCard") {
                    $('#card').show();
                        activeInput(false)
                } else {
                    $('#card').hide();
                    activeInput(true)
                }
            });

            function activeInput(value){
                var result = value;
                $( "#cardNumber" ).prop( "disabled", result );
                $( "#brand" ).prop( "disabled", result );
                $( "#expirationMonth" ).prop( "disabled", result );
                $( "#expirationYear" ).prop( "disabled", result );
                $( "#cvv" ).prop( "disabled", result );
                $( "#sender_name" ).prop( "disabled", result );
            }

        </script>

        <script>
            $("#item_amount").maskMoney();
        </script>

        <script>
            $(".btnAmount").on('click', function(){
                $("#item_amount").val($(this).val());
           })
        </script>
@endpush

@endsection

