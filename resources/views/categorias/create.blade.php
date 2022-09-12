@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="container">
  @error('titulo')
    <div class="container mt-3">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    
          {{$message}}
          <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  </div>
  @enderror
<div class="row">
    <div class="col-md-12">
    <div class="pull-right">
        <a class="btn btn-primary shadow-none" id="botonhome" data-toggle="tooltip" data-placemenet="top" title="Inicio" href="{{route('categorias.index')}}" >
        <i class="fa fa-home fa-fw" id="botonhome"></i>
        </a>
    </div>
    
    
    
</div>
</div>
<div class="col-md-12" >
    <form  action="{{route('categorias.store')}}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-12" id="form-campo" >
          <label for="titulo" class="form-label">Descripción de Categoria</label>
          <input type="text" class="form-control shadow-none" id="titulo" name="titulo" value="{{old('titulo')}}">
          <!--@error('titulo')
              <small class="text-danger">
                {{$message}}
              </small>
          @enderror-->
        </div>
        <div class="col-md-12" id="form-campo">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
</div>
</div>

@endsection