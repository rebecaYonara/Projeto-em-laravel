<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VenderModel;
use App\DrinksModel;
use Session;

class VenderController extends Controller
{
    public function index()
    {
        $drinks = DrinksModel::all();
        $vendas = VenderModel::all();
        return view('vender', compact('vendas', 'drinks'));
    }

    public function create()
    {
        return view('vender');
    }

    public function store(Request $request) {
        $user = Session::get('usuario');

        // Validação
        $rules = [
            'vrunit' => 'required',
            'vrtotal' => 'required',
            'quantidade' => 'required|min:1',
            'fk_drink' => 'required',
        ];

        $messages = [
            'vrunit.required' => 'O campo valor unitário é obrigatorio',
            'vrtotal.required'  => 'O campo valor total é obrigatorio',
            'quantidade.required'  => 'O campo quantidade é obrigatorio',
            'fk_drink.required'  => 'Selecione um drink'
        ];

        $this->validate($request, $rules, $messages);

        $fkdrink = json_decode($request->get('fk_drink'));

        $venda = new VenderModel([
            'vrtotal' => $request->get('vrtotal'),
            'vrunit' => $request->get('vrunit'),
            'quantidade' => $request->get('quantidade'),
            'fk_usuario' => $user->id,
            'fk_drink' => $fkdrink->id
        ]);
        $venda->save();

        return redirect('/vender')->with('SUCESSO', 'Venda realizada com sucesso');
    }

    public function destroy($id)
    {
        $drink = VenderModel::where('id', $id)->delete();
        Session::flash('SUCESSO', "Venda #($id) foi deletada");
        return redirect()->route('vender.index');
    }
}
