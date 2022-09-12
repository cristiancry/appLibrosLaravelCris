@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="
                Inicio" href="{{route('autores.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div clss="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Autor</th>
                        <th scope="col">sexo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{$data->cod_autor}}</td>
                        <td scope="row">{{$data->nombrecompleto}}</td>
                        <td scope="row">{{$data->sexo->descripcion ??  'n/a'}}</td>
                    </tr>
                </tbody>
            </table>
           
              
                
            </div>
        </div>
    </div>
</div>
@endsection