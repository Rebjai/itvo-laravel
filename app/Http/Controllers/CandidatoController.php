<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::all();
        return view('candidato.list',compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['foto'] = $request->file('foto')->store('images',['disk'=> 'public']);
        $data['perfil'] = $request->file('perfil')->store('pdf', ['disk'=> 'public']);
        $candidato = Candidato::create($data);
        return redirect('candidato')->with(
            'success',
            $candidato->nombrecompleto . ' guardado satisfactoriamente ...'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        $candidatos = Candidato::all();
        return view('candidato.edit', compact('candidatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }

     /**
     * Validate the request data.
     *
     * @param  Request  $request
     * @return Array $valid
     */
    private function validateData(Request $request)
    {
        $validated = $request->validate([
            'nombrecompleto' => ['required', 'max:150'],
            'sexo' => ['required', 'max:1'],
            'foto' => ['required', 'image'],
            'perfil' => ['required', 'file', 'mimes:pdf'],

        ]);
        return $validated;
    }
}
