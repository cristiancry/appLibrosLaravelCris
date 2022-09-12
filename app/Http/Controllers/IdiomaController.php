<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idioma = Idioma::orderBy('cod_idioma', 'ASC')->paginate(5);
        return view('idiomas.index', ['idioma' => $idioma]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idiomas.create');
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
            'descripcion'=>'required|min:3|max:100|unique:lib_idioma'
        ]);
        Idioma::create($request->all());
        return redirect()
        ->route('idiomas.index')
        ->with('message','Idioma creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Idioma $idioma)
    {
        return view('idiomas.show', ['idiomasa'=>$idioma]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Idioma $idioma)
    {
        return view('idiomas.edit', ['idiomas'=>$idioma]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idioma $idioma)
    {
        $request->validate([
            'descripcion'=>'required|min:3|max:100|unique:lib_idioma,descripcion,'.$idioma->cod_idioma.',cod_idioma'
        ]);
        $idioma->fill($request->only([ //sacar la descripcion actual ingresada del objeto idioma
            'descripcion'
        ]));
        if($idioma->isClean()){   // revisar si lo ingresado no tuvo algun cambio
            return back()->with('mensajedeadvertencia','debe realizar al menos un cambio para al menos actualizar');
        }
        $idioma->update($request->all());
        
        
        return back()->with('message','Idioma actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idioma $idioma)
    {
        $idioma->delete();
        return redirect()->route('idiomas.index')->with('message', 'Idioma eliminado exitosamente');
    }
}
