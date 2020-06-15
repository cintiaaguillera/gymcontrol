<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//use Route;

class LoginController extends Controller
{
    var $erros=[];

    //use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->erros = [
            "email" => "",
            "senha" => "",
        ];

        $this->middleware('guest', ['except' => ['logout']]);
    }

    public function login(){
        return view('login');
    }

    public function autenticar(LoginRequest $request){
        try{
        //$credentials = $request->only('email', 'senha');

        $email = $request->email;
        $senha = $request->senha;
        //$senha = Hash::make($request->senha);
        //Hash::check('plain-text', $hashedPassword);

        //Auth::attempt($credentials)

        if (Auth::attempt(['email' => $email, 'password' => $senha])) {
            // TODO: Checar porque não esta funcionando com ajax
            return redirect()->intended('/');
            //return redirect()->route("home");
            //return redirect('/admin/cadastrar/cliente');
        }
       
        throw new Exception('Usuario ou senha inválidos'); 

        }catch(Exception $e){
            return response()->json(
                [
                    //"errormessage" => "Usuário ou senha inválidos",
                    "errormessage" => $e->getMessage(),
                    "errors" => $this->erros,
                ]
                , 500);
        }
    }

    public function logout(){
       Auth::logout();
       //return redirect()->route('/'); 
       return redirect("/");
    }
  
}
