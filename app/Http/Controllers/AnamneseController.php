<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anamnese;

class AnamneseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anamneses = Anamnese::all();

        return view('anamneses.index', compact('anamneses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anamneses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'=>'required|string',
            'answer'=> 'required|string',
        ]);

        $anamnese = new Anamnese([
            'question' => $request->get('question'),
            'answer'=> $request->get('answer')
        ]);
        
        $anamnese->save();

        return redirect('/anamneses')->with('success', 'Anamnese adicionada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anamnese = Anamnese::find($id);

        return view('anamneses.show', compact('anamnese'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anamnese = Anamnese::find($id);

        return view('anamneses.edit', compact('anamnese'));
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
        $request->validate([
            'question'=>'required|string',
            'answer'=> 'required|string',
        ]);

        $anamnese = Anamnese::find($id);

        $anamnese->answer = $request->get('answer');
        $anamnese->question = $request->get('question');
        $anamnese->save();


        return redirect('/anamneses')->with('success', 'Anamnese alterada');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anamnese = Anamnese::find($id);
        $anamnese->delete();

        return redirect('/anamneses')->with('success', 'Anamnese excluída');

    }
}