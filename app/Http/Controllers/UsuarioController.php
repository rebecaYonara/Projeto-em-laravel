<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioModel;
use Session;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = UsuarioModel::all();
        return view('usuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // Validação
        $rules = [
            'nmusuario'=>'required',
            'cargo'=>'required|string',
            'login'=>'required|string',
            'senha'=>'required|string|min:5',
            'ativo'=>'required|string',
            'dtnascimento'=>'required|string:date',
        ];

        $messages = [
            'nmusuario.required' => 'O campo nome é obrigatorio',
            'cargo.required'  => 'O campo cargo é obrigatorio',
            'login.required'  => 'O campo login é obrigatorio',
            'senha.required'  => 'O campo senha é obrigatorio',
            'senha.min'  => 'A senha deverá ter no minímo 5 caracteres',
            'dtnascimento.required'  => 'O campo data de nascimento é obrigatorio'
        ];

        $this->validate($request, $rules, $messages);

        $usuarios = new UsuarioModel([
            'nmusuario'=>$request->get('nmusuario'),
            'cargo'=>$request->get('cargo'),
            'login'=>$request->get('login'),
            'senha'=>$request->get('senha'),
            'ativo'=>$request->get('ativo'),
            'dtnascimento'=>$request->get('dtnascimento'),
        ]);
        $usuarios->save();
        return redirect('/usuarios')->with('SUCESSO', 'Usuario criado com sucesso');
    }

    public function edit($id)
    {
        $usuarios = UsuarioModel::find($id);
        return view('editusuario', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {

        // Validação
        $rules = [
            'nmusuario'=>'required',
            'cargo'=>'required|string',
            'login'=>'required|string',
            'senha'=>'required|string',
            'dtnascimento'=>'required|string',
        ];

        $messages = [
            'nmusuario.required' => 'O campo nome é obrigatorio',
            'cargo.required'  => 'O campo cargo é obrigatorio',
            'login.required'  => 'O campo login é obrigatorio',
            'senha.required'  => 'O campo senha é obrigatorio',
            'dtnascimento.required'  => 'O campo data de nascimento é obrigatorio'
        ];

        $this->validate($request, $rules, $messages); 

        $usuarios = UsuarioModel::findOrFail($id);
        $usuarios->nmusuario        = $request->nmusuario;
        $usuarios->cargo            = $request->cargo;
        $usuarios->login            = $request->login;
        $usuarios->senha            = $request->senha;
        $usuarios->ativo            = $request->ativo;
        $usuarios->dtnascimento     = $request->dtnascimento;
        $usuarios->save();
        Session::flash('alteracao', "Registro #($id) foi alterado com sucesso");
        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $usuarios = UsuarioModel::where('id', $id)->delete();
        Session::flash('SUCESSO', "Registro #($id) foi excluído(a) com êxito");
        return redirect()->route('usuarios.index');
    }
}
