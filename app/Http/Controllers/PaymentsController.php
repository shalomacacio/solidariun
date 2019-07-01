<?php

namespace Solidariun\Http\Controllers;



use Solidariun\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Solidariun\Http\Requests\PaymentCreateRequest;
use Solidariun\Http\Requests\PaymentUpdateRequest;
use Solidariun\Repositories\PaymentRepository;
use Solidariun\Repositories\CampanhaRepository;
use Solidariun\Validators\PaymentValidator;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PagSeguro;
/**
 * Class PaymentsController.
 *
 * @package namespace Solidariun\Http\Controllers;
 */
class PaymentsController extends Controller
{
    /**
     * @var PaymentRepository
     */
    protected $repository;

    /**
     * @var PaymentValidator
     */
    protected $validator;

    protected $camp_repository;

    /**
     * PaymentsController constructor.
     *
     * @param PaymentRepository $repository
     * @param PaymentValidator $validator
     */
    public function __construct(PaymentRepository $repository, PaymentValidator $validator, CampanhaRepository $camp_repository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->camp_repository = $camp_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $payments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $payments,
            ]);
        }

        return view('payments.index', compact('payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaymentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */

    public function store(PaymentCreateRequest $request)
    {
        // return dd($request);
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $payment = $this->repository->create($request->all());

            $response = [
                'message' => 'Payment created.',
                'data'    => $payment->toArray(),
            ];

            $this->pay($payment);

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function solidarizar_se($id){

        $campanha = $this->camp_repository->find($id);
        return view('payments.payment', compact('campanha'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $payment,
            ]);
        }

        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = $this->repository->find($id);

        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PaymentUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PaymentUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $payment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Payment updated.',
                'data'    => $payment->toArray(),
            ];

            return dd($response);

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Payment deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Payment deleted.');
    }

    public function pay($request)
    {
        // return dd($request);
        $pagseguro = PagSeguro::setReference($request->id)
        ->setSenderInfo([
          'senderName' => $request->name, //Deve conter nome e sobrenome
          'senderPhone' => $request->sender_phone, //'(85) 98704-7679', //Código de área enviado junto com o telefone
          'senderEmail' => $request->sender_email,
          'senderHash' => $request->sender_hash,
          'senderCPF' => $request->sender_cpf,  //Ou CNPJ se for Pessoa Júridica
        ])
        ->setCreditCardHolder([
          'creditCardHolderBirthDate' => Carbon::parse( $request->creditcard_holderbirthdate)->format('d/m/Y'),  //'10/02/2000',
        ])
        ->setShippingAddress([
          'shippingAddressStreet' => 'Não informado',
          'shippingAddressNumber' => 'Não informado',
          'shippingAddressDistrict' => 'Não informado',
          'shippingAddressPostalCode' => '61946-085',
          'shippingAddressCity' => 'Não informado',
          'shippingAddressState' => 'CE'
        ])
        ->setItems([
          [
            'itemId' => '1',
            'itemDescription' => $request->campanha->title,
            'itemAmount' => $request->item_amount, //Valor unitário
            'itemQuantity' => '1', // Quantidade de itens
          ]
        ])
        ->send([
          'paymentMethod' => $request->payment_method,
          'creditCardToken' => $request->creditcard_token,
          'installmentQuantity' => '1',
          'installmentValue' => $request->item_amount, //apenas se for parcelado
        ]);

        // return $pagseguro;
         //$pagseguro->paymentLink;

         //se houver retorno do pagseguro grava no bando
        //  if($pagseguro ){
        //     $input = $request->all();
        //     $input['code'] = $pagseguro->code;
        //     $input['status'] = $pagseguro->status;
        //     $input['payment_method'] = $pagseguro->paymentMethod;

        //      if($request->paymentMethod == "boleto"){
        //         $input['payment_link'] = $pagseguro->paymentLink;
        //      }

        //     //  $payment = $this->repository->update($input, $pagseguro->reference);
        //      $payment = $this->repository->update($input, $result->reference);
        //      $response = [
        //         'message' => 'Transação realizada.',
        //         'data'    => $payment->toArray(),
        //     ];
        //      return redirect()->back()->with('message', $response['message']);
        //  }

    }


    public function notifications(Request $request ){
        header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
        $result = PagSeguro::notification($request->notificationCode, $request->notificationType);
        Log::debug($result->reference);
        $pagseguro['code'] = $result->code;
        $pagseguro['status'] = $result->status;
        $pagseguro['payment_link'] = $result->paymentLink;
        $pagseguro['item_amount'] = $result->grossAmount;
        $payment = $this->repository->update($pagseguro, $result->reference);
    }
}
