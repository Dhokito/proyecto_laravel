<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;
use \PDF;

class CocheController extends Controller
{
    public function imprimir(){
        $coches = Coche::all();
        $pdf = \PDF::loadView('pdfs.coches_pdf', compact('coches'));
        return $pdf->download('informe_coches.pdf');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coches = Coche::all();
        return view('coches.index', compact('coches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coches = Coche::all();

        return view('coches.create', compact('coches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Coche::create($request->all());
        return redirect()->route('coches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coche = Coche::find($id);
        return view('coches.edit', compact('coche'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coche = Coche::find($id);
        $coche->update($request->all());

        return redirect()->route('coches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coche::find($id)->delete();

        return redirect()->route('coches.index'); 
    }
}
