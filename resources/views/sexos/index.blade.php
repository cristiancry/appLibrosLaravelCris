@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Sexo" href="{{route('sexos.create')}}"> 
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    </div>
    <div class="row">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
            
        @endif
        <div class="col-md-12">
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
                        @foreach ($data as $sexo )
                            
                        
                        <tr>
                            <td class="text-center" width="20%">
                                <a href="{{route('sexos.show',   $sexo  )}}" class="btn btn-primary btn-sm shadow-none" 
                                        data-toggle="tooltip" data-placement="top" title="Ver Sexo">
                                    <i class="fa fa-book fa-fw text-white"></i></a>
                                </a>
                                <a href="" class="btn btn-success btn-sm shadow-none" 
                                        data-toggle="tooltip" data-placement="top" title="Editar Sexo">
                                    <i class="fa fa-pencil fa-fw text-white"></i></a>
                                </a>
                                <form action="" method="POST" class="d-inline-block">
                                    <button id="delete" name="delete" type="submit" 
                                            class="btn btn-danger btn-sm shadow-none" 
                                            data-toggle="tooltip" data-placement="top" title="Eliminar Sexo"
                                            onclick="return confirm('¿Estás seguro de eliminar?')">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                    </button>
                                </form>
                            </td>
                            <td scope="row">{{$sexo->cod_sexo}}</td>
                            <td scope="row">{{$sexo->descripcion}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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