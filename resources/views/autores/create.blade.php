@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="container">
  @error('descripcion')
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
        <a class="btn btn-primary shadow-none" id="botonhome" data-toggle="tooltip" data-placemenet="top" title="Inicio" href="{{route('sexos.index')}}" >
        <i class="fa fa-home fa-fw" id="botonhome"></i>
        </a>
    </div>
    
    
    <div class="contenido-medio">
			<div class="container">	
				<div class="d-flex justify-content-center h-100">
					<div class="card">
					  <!--cabeza del formulario-->	
						<div class="card-header bg-success text-white">
							<h3>Registro Autores</h3>
						</div> 
					  <!--fin de cabeza-->
					  <!--Inicio cuerpo de formulario-->	   
						  <div class="card-body bg-primary">
					
							<form class="form-group" method="POST" action={{route('autores.store')}}>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          	 
								@csrf
								{{-- nombres --}}
								<div class="input-group form-group" id="formu">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-user"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="nombres" name="nombres"  value="{{ old('nombres') }}"> 
									@error('nombres')
									<small class="text-danger" role="alert">
										{{ $message }}
									</small>
								@enderror
								</div>
								{{-- apellidos --}}
								<div class="input-group form-group" id="formu">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="apellidos" name="apellidos" value="{{ old('apellidos') }}">
									@error('apellidos')
									<small class="text-danger" role="alert">
										{{ $message }}
									</small>
								@enderror
								</div>
								
								
								{{-- seleccionar sexo --}}
								<div class="input-group form-group" id="formu">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									
									<select id="sexo" class="form-select shadow-none" name="cod_sexo" value="">
									<option value="" selected> Seleccionar sexo.....</option>
									@foreach ( $sexos as $sexo )
										<option value="{{$sexo->cod_sexo}}"
											{{old('cod_sexo')==$sexo->cod_sexo ? 'selectec' : ''}}
											>
											{{$sexo->descripcion}}</option>
									@endforeach
								</select>
									@error('cod_sexo')
									<small class="text-danger" role="alert">
										Seleccione un Sexo
									</small>
								@enderror
								</div>
								<div class="col-md-12" id="form-campo">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
						  </form>
						       
							   <!--fin de pie formulario-->
						 </div>
						 <!--fin de cuerpo de formulario-->
					  </div>		
				  </div>	
			  </div>	
		</div>
    
</div>
</div>

</div>

@endsection