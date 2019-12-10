<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstoqueModel;
use App\DrinksModel;
use Session;
use Illuminate\Support\Facades\DB;

class DrinksController extends Controller
{
    public function index()
    {
        $estoque = EstoqueModel::all();
        // $drinks = DrinksModel::all();

        $drinks = DB::table('tbl_drinks')
            ->select(DB::raw('
                tbl_drinks.id as id,
                tbl_drinks.nmdrink as nmdrink,
                tbl_drinks.qtd_ml_principal as qtd_ml_principal,
                tbl_drinks.vrdrink as vrdrink,
                tbl_ingredientes.nmingrediente as nmingrediente'))
            ->join('tbl_ingredientes', 'tbl_drinks.fk_ingrediente_principal', '=', 'tbl_ingredientes.id')
            // ->join('tbl_ingredientes', 'tbl_drinks.fk_ingrediente_adicional', '=', 'tbl_ingredientes.id')
            ->get();
        return view('drinks', compact('estoque', 'drinks'));
    }

    public function create()
    {
        return view('drinks');
    }

    public function store(Request $request)
    {
        // Validação
        $rules = [
            'nmdrink' => 'required',
            'vrdrink' => 'required',
            'qtd_ml_principal' => 'required|min:1',
            'fk_ingrediente_principal' => 'required',
            'fk_ingrediente_adicional' => 'required'
        ];

        $messages = [
            'nmdrink.required' => 'O campo nome do drink é obrigatorio',
            'vrdrink.required'  => 'O valor do drink é obrigatorio',
            'qtd_ml_principal.required'  => 'A quantidade é obrigatória',
            'fk_ingrediente_principal.required'  => 'Selecione uma bebida',
            'fk_ingrediente_adicional.required'  => 'Selecione uma bebida adicional'
        ];

        $this->validate($request, $rules, $messages);

        $drink = new DrinksModel([
            'nmdrink' => $request->get('nmdrink'),
            'vrdrink' => $request->get('vrdrink'),
            'qtd_ml_principal' => $request->get('qtd_ml_principal'),
            'qtd_ml_adicional' => $request->get('qtd_ml_adicional') == null ? 0 : $request->get('qtd_ml_adicional'),
            'fk_ingrediente_principal' => $request->get('fk_ingrediente_principal'),
            'fk_ingrediente_adicional' => $request->get('fk_ingrediente_adicional')
        ]);
        $drink->save();
        return redirect('/drinks')->with('SUCESSO', 'Drink criado com sucesso');
    }

    public function destroy($id)
    {
        $drink = DrinksModel::where('id', $id)->delete();
        Session::flash('SUCESSO', "Ingrediente #($id) foi excluído");
        return redirect()->route('drinks.index');
    }
    
    public function edit($id)
    {
        $drink = DrinksModel::find($id);
        $estoque = EstoqueModel::all();
        return view('editdrink', compact('estoque', 'drink'));
    }

    public function update(Request $request, $id)
    {

        // Validação
        $rules = [
            'nmdrink' => 'required',
            'vrdrink' => 'required',
            'qtd_ml_principal' => 'required|min:1',
            'fk_ingrediente_principal' => 'required',
            'fk_ingrediente_adicional' => 'required'
        ];

        $messages = [
            'nmdrink.required' => 'O campo nome do drink é obrigatorio',
            'vrdrink.required'  => 'O valor do drink é obrigatorio',
            'qtd_ml_principal.required'  => 'A quantidade é obrigatória',
            'fk_ingrediente_principal.required'  => 'Selecione uma bebida',
            'fk_ingrediente_adicional.required'  => 'Selecione uma bebida adicional'
        ];

        $this->validate($request, $rules, $messages);

        $drink = DrinksModel::findOrFail($id);
        $drink->nmdrink        = $request->nmdrink;
        $drink->vrdrink            = $request->vrdrink;
        $drink->qtd_ml_principal            = $request->qtd_ml_principal;
        $drink->qtd_ml_adicional            = $request->qtd_ml_adicional;
        $drink->fk_ingrediente_principal            = $request->fk_ingrediente_principal;
        $drink->fk_ingrediente_adicional     = $request->fk_ingrediente_adicional;
        $drink->save();
        Session::flash('alteracao', "Registro #($id) foi alterado");
        return redirect()->route('drinks.index');
    }
}
