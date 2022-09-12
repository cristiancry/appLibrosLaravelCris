@extends('layouts.app')

@section('content')
<div class="row">
    @if (session()->has('message'))
    <div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  
        {{session()->get('message')}}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
    @endif
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar categoria" href="{{route('categorias.create')}}"> 
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    </div>
    
        <div class="col-md-12">
            @if(sizeof($data)>0)
            <div class="table-responsive">
            
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Acciones</th>
                        <th scope="col">#</th>
                        <th scope="col">Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                            
                       
                        @foreach ($data as $categoria )
                            
                        
                        <tr>
                            <td class="text-center" width="20%">
                                <a href="{{route('categorias.show',   $categoria  )}}" class="btn btn-primary btn-sm shadow-none" 
                                        data-toggle="tooltip" data-placement="top" title="Ver categoria">
                                    <i class="fa fa-book fa-fw text-white"></i></a>
                                </a>
                                <a href="{{route('categorias.edit', $categoria)}}" class="btn btn-success btn-sm shadow-none" 
                                        data-toggle="tooltip" data-placement="top" title="Editar categoria">
                                    <i class="fa fa-pencil fa-fw text-white"></i></a>
                                </a>
                                <form action="{{route('categorias.destroy', $categoria)}}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button id="delete" name="delete" type="submit" 
                                            class="btn btn-danger btn-sm shadow-none" 
                                            data-toggle="tooltip" data-placement="top" title="Eliminar categoria"
                                            onclick="return confirm('¿Estás seguro de eliminar?')">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                    </button>
                                </form>
                            </td>
                            <td scope="row">{{$categoria->cod_categoria}}</td>
                            <td scope="row">{{$categoria->titulo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>
            
            </div>
            @else
            <div class="alert alert-secondary">No se encontraron resutlados.</div>
            @endif
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>