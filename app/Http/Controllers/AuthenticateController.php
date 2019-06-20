<?php

namespace Solidariun\Http\Controllers;

use Illuminate\Http\Request;

use Solidariun\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Solidariun\Http\Requests\UserCreateRequest;
use Solidariun\Http\Requests\UserUpdateRequest;
use Solidariun\Repositories\UserRepository;
use Solidariun\Validators\UserValidator;
use Exception;
use Auth;

class AuthenticateController extends Controller
{

        /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;
    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    public function login()
    {
        return view ('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return view ('auth.login');
    }

    public function auth(Request $request)
    {
        $data = [
            'email'=> $request->get('email'),
            'password'=> $request->get('password')
        ];

        try {
            if(env('PASSWORD_HASH')){
                Auth::attempt($data, false);
            }else{
                $user = $this->repository->findWhere(['email'=>$request->get('email') ])->first();

                if(!$user){
                    throw new Exception("Email inválido");
                }

                if($user->password != $request->get('password')){
                    throw new Exception("Senha inválida");
                }

                Auth::login($user);
                return redirect()->route('site');
            }

        } catch (\Throwable $th) {
            //throw $th;
            echo ('erro');
            return dd($th);
        }
    }
}
