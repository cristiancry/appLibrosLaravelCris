@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-md-12">
    <div class="pull-right">
        <a class="btn btn-primary shadow-none" id="botonhome" data-toggle="tooltip" data-placemenet="top" title="Inicio" href="{{route('sexos.index')}}" >
        <i class="fa fa-home fa-fw" id="botonhome"></i>
        </a>
    </div>
</div>
</div>
@if (session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
            
        @endif

<div class="col-md-12" >
    <form  action="{{route('sexos.update', $sexo)}}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-12" id="form-campo" >
          <label for="descripcion" class="form-label">Actualizacion de Sexo</label>
          <label for="descripcion" class="form-label-des">Antigua Descripcion</label>
          <label for="descripcion" class="form-label-des">{{$sexo->descripcion}}</label>
          <input type="text" class="form-control shadow-none" id="descripcion" name="descripcion" value="{{$sexo->descripcion}}">
          @error('descripcion')
              <small class="text-danger">
                {{$message}}
              </small>
          @enderror
        </div>
        <div class="col-md-12" id="form-campo">
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
</div>
</div>

@endsection