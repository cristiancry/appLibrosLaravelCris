@extends('layouts.app')

@section('content')
@if (session()->has('success'))
    <div class="container mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  
        {{session()->get('success')}}
        <button class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif
    @if (session()->has('warning'))
    <div class="container mt-3">
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
    
          {{session()->get('warning')}}
          <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  </div>
    @endif
    @error('titulo')
    <div class="container mt-3">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    
          {{$message}}
          <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  </div>
  @enderror
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="container">
<div class="row">
    <div class="col-md-12">
    <div class="pull-right">
        <a class="btn btn-primary shadow-none" id="botonhome" data-toggle="tooltip" data-placemenet="top" title="Inicio" href="{{route('categorias.index')}}" >
        <i class="fa fa-home fa-fw" id="botonhome"></i>
        </a>
    </div>
</div>
</div>

    
<div class="container mt-3">
<div class="col-md-12" >
    <form  action="{{route('categorias.update', $categoria)}}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-12" id="form-campo" >
          <label for="titulo" class="form-label">Actualizacion de Categoria</label>
          <label for="titulo" class="form-label-des">Antiguo Titulo</label>
          <label for="titulo" class="form-label-des">{{$categoria->titulo}}</label>
          <input type="text" class="form-control shadow-none" id="titulo" name="titulo" value="{{old('titulo', $categoria->titulo)}}">
          <!--@error('titulo')
              <small class="text-danger">
                {{$message}}
              </small>
          @enderror-->
        </div>
        <div class="col-md-12" id="form-campo">
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
</div>
</div>
</div>

@endsection