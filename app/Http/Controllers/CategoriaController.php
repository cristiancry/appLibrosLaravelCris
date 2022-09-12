<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('cod_categoria', 'ASC')->paginate(5);
        return view('categorias.index', ['data' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            'titulo'=>'required|min:3|max:100|unique:lib_categoria'
        ]);
        Categoria::create($request->all());
        return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoria creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', ['data'=>$categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', ['categoria'=>$categoria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'titulo'=>'required|min:3|max:100|unique:lib_categoria,titulo,'.$categoria->cod_categoria.',cod_categoria'
        ]);
        $categoria->fill($request->only([ //sacar el titulo actual ingresada del objeto   categoria
            'titulo'
        ]));
        if($categoria->isClean()){   // revisar si lo ingresado no tuvo algun cambio
            return back()->with('warning','debe realizar al menos un cambio para al menos actualizar');
        }
        $categoria->update($request->all());
        
        //return redirect()->route('categorias.index')->with('message', 'Categoria actualizado exitosamente');
        return back()->with('success','Categoria actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('danger', 'Categoria eliminada exitosamente');
    }
}
