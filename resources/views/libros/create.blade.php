@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<div class="container">
 {{--  @error('descripcion')
    <div class="container mt-3">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    
          {{$message}}
          <button class="btn-close" data-bs-dismiss="alert"></button>
      </div>
  </div>
  @enderror --}}
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
							<h3>Registro de Libros</h3>
						</div> 
					  <!--fin de cabeza-->
					  <!--Inicio cuerpo de formulario-->	   
						  <div class="card-body bg-primary">
					
							<form class="form-group" method="POST" action={{route('libros.store')}}>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          	 
								@csrf
								{{-- titulo --}}
								<div>
										
									@error('titulo')
									<small class="text-danger" role="alert">
										{{ $message }}
									</small>
								@enderror</div>
								<div class="input-group form-group" id="formu">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-user"></i></span>
									</div>
									<input type="text" class="form-control" placeholder="titulo" 
									name="titulo"  value="{{ old('titulo') }}"> 
									
								</div>
								
								{{-- descripcion --}}
								<div >@error('descripcion')
									<small class="text-danger" role="alert">
										{{ $message }}
									</small>
								@enderror</div>
								<div class="input-group form-group" id="formu">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<textarea class="form-control shadow-none" style="border-radius: 0%" placeholder="Descripcion...." name="descripcion" id="descripcion" cols="30" rows="5" value="">{{ old('descripcion') }}</textarea>
									
								</div>
								{{-- fecha de publicacion --}}
								<div>
									@error('fecha_publicacion')
									<small class="text-danger" role="alert">
										{{ $message }}
									</small>
								@enderror
								</div>
								<div class="input-group form-group" id="formu">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									<input type="date" class="form-control" placeholder="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') }}">
									
								</div>
								
								
								{{-- seleccionar idioma --}}
								<div>
									@error('cod_idioma')
									<small class="text-danger" role="alert">
										Seleccione un idioma
									</small>
								@enderror
								</div>
								<div class="input-group form-group" id="formu">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-user"></i></span>
									</div>
									
									<select id="idioma" class="form-select shadow-none" name="cod_idioma" value="">
									<option value="" selected> Seleccionar Idioma.....</option>
									@foreach ( $idiomas as $idioma )
										<option value="{{$idioma->cod_idioma}}"
											{{old('cod_idioma')==$idioma->cod_idioma ? 'selectec' : ''}}
											>
											{{$idioma->descripcion}}</option>
									@endforeach
								</select>
								
								</div>
								<div class="col-md-8">
									<label for="categorias" class="form-label">Categorías</label><br>
									  @if(sizeof($categorias) > 0)
									  @foreach ($categorias as $cod_categoria => $titulo)
										  <input type="checkbox" value="{{ $cod_categoria }}"  name="categorias[] " 
										  {{ ( is_array(old('categorias') ) && in_array($cod_categoria, old('categorias')) ) ? 'checked ' : '' }}>
										  {{ $titulo }}
										  <br> 
									  @endforeach
									  <br>
									  @error('categorias')
										  <small class="text-danger" role="alert">
											  {{ $message }}
										  </small>
									  @enderror
									  @else
										<div class="alert alert-secondary">No se encontraron resultados.</div>
										@error('categorias')
											<small class="text-danger" role="alert">
												{{ $message }}
											</small>
										@enderror
									@endif
								  </div>
								  <div class="col-md-8">
									<label for="autores" class="form-label">Autores</label><br>
									  @if(sizeof($autores) > 0)
									  @foreach ($autores as $cod_autor => $nombrecompleto)
										  <input type="checkbox" value="{{ $cod_autor }}" name="autores[]" 
										  {{ ( is_array(old('autores') ) && in_array($cod_autor, old('autores')) ) ? 'checked ' : '' }}>
										  {{ $nombrecompleto }}
										  <br> 
									  @endforeach
									  <br>
									  @error('autores')
										  <small class="text-danger" role="alert">
											  {{ $message }}
										  </small>
									  @enderror
									  @else
										<div class="alert alert-secondary">No se encontraron resultados.</div>
										@error('autores')
										  <small class="text-danger" role="alert">
											  {{ $message }}
										  </small>
									  @enderror
									@endif
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