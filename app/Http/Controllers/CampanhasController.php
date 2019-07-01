<?php

namespace Solidariun\Http\Controllers;

use Illuminate\Http\Request;

use Solidariun\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Solidariun\Http\Requests\CampanhaCreateRequest;
use Solidariun\Http\Requests\CampanhaUpdateRequest;
use Solidariun\Repositories\CampanhaRepository;
use Solidariun\Validators\CampanhaValidator;

use Image;
use Input;



/**
 * Class CampanhasController.
 *
 * @package namespace Solidariun\Http\Controllers;
 */
class CampanhasController extends Controller
{
    /**
     * @var CampanhaRepository
     */
    protected $repository;

    /**
     * @var CampanhaValidator
     */
    protected $validator;

    /**
     * CampanhasController constructor.
     *
     * @param CampanhaRepository $repository
     * @param CampanhaValidator $validator
     */
    public function __construct(CampanhaRepository $repository, CampanhaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->middleware('auth')->except(['index', 'recentes', 'show', 'home']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $campanhas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $campanhas,
            ]);
        }
        return view('campanhas.index', compact('campanhas'));
    }

    public function home(){
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $campanhas = $this->repository->scopeQuery(function($query){
            return $query
                ->where('flg_active', 1)
                ->take(3)
                ->orderBy('created_at','asc');
        })->all();

        return view('welcome', compact('campanhas'));
    }

    public function create(){
        return view('campanhas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CampanhaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CampanhaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            //cria um nome para imagem realiza upload
            $imageName = time().'.'.request()->img->getClientOriginalExtension();
            $upload = $request->img->storeAs('img/campanha', $imageName );
            //recupera o path e redimensiona
            $thumbnailpath = public_path('storage/img/campanha/'.$imageName);
            $img = Image::make($thumbnailpath)->resize(600, 303)->save($thumbnailpath);

            $input = $request->all();
            $input['img'] = $imageName;

            $campanha = $this->repository->create($input);

            $response = [
                'message' => 'Campanha created.',
                'data'    => $campanha->toArray(),
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

            // return redirect()->back()->withErrors($e->getMessageBag())->withInput();
            return $e->getMessageBag()->withInput();
        }
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
        $campanha = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $campanha,
            ]);
        }

        return view('campanhas.show', compact('campanha'));
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
        $campanha = $this->repository->find($id);

        return view('campanhas.edit', compact('campanha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CampanhaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CampanhaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $campanha = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Campanha updated.',
                'data'    => $campanha->toArray(),
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
                'message' => 'Campanha deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Campanha deleted.');
    }
}
