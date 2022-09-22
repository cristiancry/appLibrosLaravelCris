<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Sexo;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autor = Autor::orderBy('cod_autor', 'DESC')->paginate(5);
    

        return view('autores.index', ['data' => $autor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sexos=Sexo::all();
        return view('autores.create',['sexos'=>$sexos]);
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
            'nombres'=>'required|min:3|max:100',
            'apellidos'=>'required|min:3|max:100',
            /* 'cod_sexo'=>'required', */
            
        ]);
         $request['nombrecompleto']=$request->nombres."".$request->apellidos;
        Autor::create($request->all());
        
        return redirect()
        ->route('autores.index')
        ->with('success', 'Autor creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        return view('autores.show', ['data'=>$autor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        $sexos=Sexo::all();
        return view('autores.edit',['autor'=>$autor,'sexos'=>$sexos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $request->validate([
            'nombres'=>'required|min:3|max:100',
            'apellidos'=>'required|min:3|max:100',
            /* 'cod_sexo'=>'required', */
            
        ]);
        $autor->fill($request->only([
                'nombres',
                'apellidos',
                'cod_sexo',
        ]));
        if($autor->isClean()){   // revisar si lo ingresado no tuvo algun cambio
            return back()->with('warning','debe realizar al menos un cambio para al menos actualizar');
        }
        $request['nombrecompleto']=$request->nombres."".$request->apellidos;
        $autor->update($request->all());
        
        //return redirect()->route('sexos.index')->with('message', 'Sexo actualizado exitosamente');
        return back()->with('success','Autor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return redirect()->route('autores.index')->with('danger', 'autor eliminado exitosamente');
    }
}
