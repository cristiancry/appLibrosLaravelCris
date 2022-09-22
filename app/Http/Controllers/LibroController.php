<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Idioma;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=Libro::orderBy('cod_libro','ASC')->paginate(5);
        return view('libros.index',['libros'=>$libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idiomas=Idioma::all();
        return view('libros.create',['idiomas'=>$idiomas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actual=Carbon::now();
        $request->validate([
            'titulo'=>'required|min:3|max:100|unique:lib_libro',
            'descripcion'=>'required|min:3|max:200',
            'fecha_publicacion'=>'required|date|before_or_equal:'. $actual.'',
            /* 'cod_sexo'=>'required', */
            
        ]);
         
        Libro::create($request->all());
        
        return redirect()
        ->route('libros.index')
        ->with('success', 'Libro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.show',['libro'=>$libro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $idiomas=Idioma::all();
        return view('libros.edit',['libro'=>$libro,'idiomas'=>$idiomas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $actual=Carbon::now();
        $request->validate([
            'titulo'=>'required|min:3|max:100|unique:lib_libro,titulo,'.$libro->cod_libro. ',cod_libro',
            'descripcion'=>'required|min:3|max:200',
            'fecha_publicacion'=>'required|date',
            
            /* 'cod_sexo'=>'required', */
            
        ]);
        $libro->fill($request->only([
                'titulo',
                'descripcion',
                'fecha_publicacion',
                'cod_idioma',
        ]));
        if($libro->isClean()){   // revisar si lo ingresado no tuvo algun cambio
            return back()->with('warning','debe realizar al menos un cambio para al menos actualizar');
        }
        
        $libro->update($request->all());
        
        //return redirect()->route('sexos.index')->with('message', 'Sexo actualizado exitosamente');
        return back()->with('success','libro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('danger', 'libro eliminado exitosamente');
    }
}
