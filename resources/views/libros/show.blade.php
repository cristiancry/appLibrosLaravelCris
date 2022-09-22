@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="
                Inicio" href="{{route('libros.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div class="card mx-auto" style="width: 50%">
            
        <div class="table-responsive">
            <div class="card-header" ">
            <table class="table table-hover" >
                <thead >
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tiulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha de Publicacion</th>
                        <th scope="col">Idioma</th>
                    </tr>
                </thead>
            </div>
                <tbody>
                    <div class="card-body text-center">
                    <tr>
                        <td scope="row">{{$libro->cod_libro}}</td>
                        <td scope="row">{{$libro->titulo}}</td>
                        <td scope="row">{{$libro->descripcion}}</td>
                        <td scope="row">{{$libro->fecha_publicacion}}</td>
                        
                        <td scope="row">{{
                            $libro->cod_idioma
                            ? 
                            $libro->idioma->descripcion
                            :'no se asigno un idioma'

                                    }}</td>
                    </tr>
                </div>
                </tbody>
            </table>
           
              
                
            </div>
        </div>
        </div>
    </div>
<div class="col-md-12" style="margin-top: 10%">
    <div class="card mx-auto" style="width: 50%">
        <div class="card-header">
            <h2 style="text-align: center">Libro:  {{$libro->titulo}} </h2> 
        </div>
        <div class="card-body text-center">
            <div class="card-tittle"><b> Descripcion </b></div>
            <div class="card-text"> {{$libro->descripcion}}</div>
            <div class="card-tittle"><b> Idioma </b></div>
            <div class="card-text"> {{$libro->cod_idioma
                ? 
                $libro->idioma->descripcion
                :'no se asigno un idioma'

                        }}</div>
            
        </div>
        <div class="card-footer text-muted text-center">
            <div class="card-tittle"><b> Fecha publicacion </b></div>
            <div class="card-text"> {{date('d/m/Y',strtotime($libro->fecha_publicacion))}}</div>
        </div>
    </div>
</div>
@endsection