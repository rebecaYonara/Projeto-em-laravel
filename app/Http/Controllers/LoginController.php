<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        Session::forget('usuario');
        return view('login');
    }

    public function create()
    {
        return view('usuarios');
    }

    public function store(Request $request)
    {
        // Validação
        $rules = [
            'login'=>'required',
            'senha'=>'required|string'
        ];

        $messages = [
            'login.required' => 'O campo nome é obrigatorio',
            'senha.required'  => 'O campo senha é obrigatorio'
        ];

        $this->validate($request, $rules, $messages);

        $user = DB::table('tbl_usuarios')->where([
            ['login', '=', $request->get('login')],
            ['senha', '=', $request->get('senha')]
            ])->first();
        if ($user) {
            Session::put('usuario', $user);
            return redirect('/usuarios')->with('LOGIN', $user->login);
        }
        else {
            return redirect('/login')->with('ERROR', 'Login ou senha inválidas');
        }
    }
}
