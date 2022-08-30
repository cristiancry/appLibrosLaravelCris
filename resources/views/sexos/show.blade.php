@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{route('sexos.index')}}"> 
                    <i class="fa fa-home fa-fw"></i> 
                </a>
            </div>
        </div>
        <div clss="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SEXO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">{{$data->cod_sexo}}</td>
                        <td scope="row">{{$data->descripcion}}</td>
                    </tr>
                </tbody>
            </table>
           
              
                
            </div>
        </div>
    </div>
</div>
@endsection