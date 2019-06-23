<?php

namespace Solidariun\Http\Controllers;

use Illuminate\Http\Request;

use Solidariun\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Solidariun\Http\Requests\PaymentCreateRequest;
use Solidariun\Http\Requests\PaymentUpdateRequest;
use Solidariun\Repositories\PaymentRepository;
use Solidariun\Repositories\CampanhaRepository;
use Solidariun\Validators\PaymentValidator;
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
        try {


          // $requestCard =  $this->pay($request);

           //return dd($request);

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $imageName = time().'.'.request()->photo->getClientOriginalExtension();
            $upload = $request->img->storeAs('photo/campanha', $imageName);

            $payment = $this->repository->create($request->all());

            $response = [
                'message' => 'Payment created.',
                'data'    => $payment->toArray(),
            ];

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


    public function pay($request){

        //return dd($request);
        //https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=74cc63f7ca49daed817936e0646a51b18f0343aa675d3259c8862725d771ea12735280586aacca31
        $pagseguro = PagSeguro::setReference($request->campanha_id)
        ->setSenderInfo([
          'senderName' => $request->senderName, //Deve conter nome e sobrenome
          'senderPhone' => '(85) 98704-7679', //Código de área enviado junto com o telefone
          'senderEmail' => $request->senderEmail,
          'senderHash' => $request->senderHash,
          'senderCPF' => $request->senderCPF, //Ou CNPJ se for Pessoa Júridica
        ])
        ->setCreditCardHolder([
          'creditCardHolderBirthDate' => '10/02/2000',
        ])
        ->setShippingAddress([
          'shippingAddressStreet' => 'Rua/Avenida',
          'shippingAddressNumber' => 'Número',
          'shippingAddressDistrict' => 'Bairro',
          'shippingAddressPostalCode' => '12345-678',
          'shippingAddressCity' => 'Maranguape',
          'shippingAddressState' => 'CE'
        ])
        ->setItems([
          [
            'itemId' => 'ID',
            'itemDescription' => 'Nome do Item',
            'itemAmount' => $request->itemAmount, //Valor unitário
            'itemQuantity' => '1', // Quantidade de itens
          ]
        ])
        ->send([
          'paymentMethod' => $request->paymentMethod,
          'creditCardToken' => $request->creditCardToken,
          'installmentQuantity' => '1',
          'installmentValue' => $request->itemAmount, //apenas se for parcelado
        ]);

        return $pagseguro;
         //$pagseguro->paymentLink;
    }
}
