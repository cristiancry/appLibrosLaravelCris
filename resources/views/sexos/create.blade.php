@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="row">
<div class="container">
    <div class="pull-right">
        <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placemenet="top" title="Inicio" href="" >
        <i class="fa fa-home fa-fw"></i>
        </a>
    </div>
</div>
</div>
<div class="col-md-12">
    <form action="" method="post" class="row g-3" >
        <div class="col-md-6">
            <label for="descripcion" class="form-label"> Descripcion de Sexo</label>
            <input type="text" class="form-control shadow-none"  name="descripcion" id="descripcion" value="">
        </div>
        <div class="col-md-11">
            <button type="submit" class="btn btn-success"> Guardar</button>
        </div>
    </form>
</div>

@endsection