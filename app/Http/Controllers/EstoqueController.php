<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstoqueModel;
use Session;

class EstoqueController extends Controller
{
    public function index()
    {
        $estoque = EstoqueModel::all();
        return view('estoque', compact('estoque'));
    }

    public function create()
    {
        return view('estoque');
    }

    public function store(Request $request)
    {
        // Validação
        $rules = [
            'nmingrediente' => 'required',
            'tipo' => 'required|string',
            'quantidade_total_ml' => 'required|min:1',
            'validade' => 'required|string',
            'vrunitario' => 'required|string|min:1',
        ];

        $messages = [
            'nmingrediente.required' => 'O campo nome do ingrediente é obrigatorio',
            'tipo.required'  => 'O campo tipo é obrigatorio',
            'quantidade_total_ml.required'  => 'O campo login é obrigatorio',
            'validade.required'  => 'O campo senha é obrigatorio',
            'vrunitario.required'  => 'O campo data de nascimento é obrigatorio'
        ];

        $this->validate($request, $rules, $messages);

        $estoque = new EstoqueModel([
            'nmingrediente' => $request->get('nmingrediente'),
            'tipo' => $request->get('tipo'),
            'quantidade_total_ml' => $request->get('quantidade_total_ml'),
            'validade' => $request->get('validade'),
            'vrunitario' => $request->get('vrunitario')
        ]);
        $estoque->save();
        return redirect('/estoque')->with('SUCESSO', 'Ingrediente criado com sucesso');
    }

    public function edit($id)
    {
        $estoque = EstoqueModel::find($id);
        return view('editestoque', compact('estoque'));
    }

    public function update(Request $request, $id)
    {

        // Validação
        $rules = [
            'nmingrediente' => 'required',
            'tipo' => 'required|string',
            'quantidade_total_ml' => 'required|min:1',
            'validade' => 'required|string',
            'vrunitario' => 'required|string|min:1',
        ];

        $messages = [
            'nmingrediente.required' => 'O campo nome do ingrediente é obrigatorio',
            'tipo.required'  => 'O campo tipo é obrigatorio',
            'quantidade_total_ml.required'  => 'O campo login é obrigatorio',
            'validade.required'  => 'O campo senha é obrigatorio',
            'vrunitario.required'  => 'O campo data de nascimento é obrigatorio'
        ];

        $this->validate($request, $rules, $messages);

        $estoque = EstoqueModel::findOrFail($id);
        $estoque->nmingrediente         = $request->nmingrediente;
        $estoque->tipo                  = $request->tipo;
        $estoque->quantidade_total_ml   = $request->quantidade_total_ml;
        $estoque->validade              = $request->validade;
        $estoque->vrunitario            = $request->vrunitario;
        $estoque->save();
        Session::flash('alteracao', "Ingrediente #($id) foi alterado com sucesso");
        return redirect()->route('estoque.index');
    }

    public function destroy($id)
    {
        $estoque = EstoqueModel::where('id', $id)->delete();
        Session::flash('error', "Não foi possivel excluir o #($id)");
        return redirect()->route('estoque.index');
    }
}
