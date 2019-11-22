<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Clientes;
use App\ClientesEnderecos;

use Validator;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clientes = Clientes::with('enderecos')->get();

        return view('clientes.index',compact('clientes'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::validate($request->all(), [
            'nome' => 'required|max:50',
            'email' => 'required|unique:clientes|max:50',
            'telefone' => 'required|max:20'
        ]);

        $cliente = Clientes::create($request->all());

        for ($i=0; $i<count($request->cep); $i++) {
            $cliente->enderecos()->create([
                'cep' => $request->cep[$i],
                'endereco' => $request->endereco[$i],
                'bairro' => $request->bairro[$i],
                'complemento' => $request->complemento[$i],
                'numero' => $request->numero[$i],
                'cidade' => $request->cidade[$i],
                'estado' => $request->estado[$i]
            ]);
        }

        return redirect('clientes')->with('status', 'Cliente adicionado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $cliente)
    {

        $cliente = $cliente->load("enderecos");

        return view('clientes.show',compact('cliente'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::validate($request->all(), [
            'nome' => 'required|max:50',
            'email' => 'required|max:50',
            'telefone' => 'required|max:20'
        ]);

        Clientes::find($id)->update($request->all());

        ClientesEnderecos::where('clientes_id',$id)->delete();

        $cliente = Clientes::find($id);

        for ($i=0; $i<count($request->cep); $i++) {
            $cliente->enderecos()->create([
                'cep' => $request->cep[$i],
                'endereco' => $request->endereco[$i],
                'bairro' => $request->bairro[$i],
                'complemento' => $request->complemento[$i],
                'numero' => $request->numero[$i],
                'cidade' => $request->cidade[$i],
                'estado' => $request->estado[$i]
            ]);
        }

        return redirect('clientes')->with('status', 'Cliente atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $cliente)
    {
        $cliente->delete();

        return redirect('clientes')->with('status', 'Cliente removido com sucesso!');
        
    }
}
