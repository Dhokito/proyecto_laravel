<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Rules\Validaciondni;
use \PDF;

class ClienteController extends Controller
{
    public function imprimir(){
        $clientes = Cliente::all();
        $pdf = \PDF::loadView('pdfs.clientes_pdf', compact('clientes'));
        return $pdf->download('informe_clientes.pdf');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();

        return view('clientes.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'        => 'required|min:5|max:100',
            'apellidos'     => 'required|min:2|max:100',
            'dni'           => [new Validaciondni],
            'f_nacimiento'  => 'required|date',
            'telefono'      =>  'required|min:9|max:12',
            'email'         => 'required|min:5|max:100',

        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre'        => 'required|min:5|max:100',
            'apellidos'     => 'required|min:2|max:100',
            'f_nacimiento'  => 'required|date',
            'telefono'      =>  'required|min:9|max:12',
            'email'         => 'required|min:5|max:100',
        ]);

        $cliente = Cliente::find($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::find($id)->delete();

        return redirect()->route('clientes.index');  
    }
}
