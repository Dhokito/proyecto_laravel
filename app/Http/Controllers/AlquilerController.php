<?php

namespace App\Http\Controllers;

use App\Models\Alquiler;
use Illuminate\Http\Request;
use \PDF;

class AlquilerController extends Controller
{
    public function imprimir(){
        $alquilers = Alquiler::all();
        $pdf = \PDF::loadView('pdfs.alquilers_pdf', compact('alquilers'));
        return $pdf->download('informe_alquileres.pdf');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alquilers = Alquiler::all();
        return view('alquilers.index', compact('alquilers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alquilers = Alquiler::all();

        return view('alquilers.create', compact('alquilers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alquiler::create($request->all());
        return redirect()->route('alquilers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function show(Alquiler $alquiler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alquiler = Alquiler::find($id);
        return view('alquilers.edit', compact('alquiler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alquiler = Alquiler::find($id);
        $alquiler->update($request->all());

        return redirect()->route('alquilers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alquiler  $alquiler
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alquiler::find($id)->delete();

        return redirect()->route('alquilers.index');
    }
}
