@extends('layouts.app')

@section('title', 'Modificar serie')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_cine.jpg') }}');">
    
</div>
<div class="main main-raised">
	<div class="container">
		<div class="section">
			@include('errors.alerts.errorUser')

			<div class="col-md-4">
				<h2>{{ $pelicula->title }}</h2>
				<div class="product-block">
					<img class="img-responsive" style="width: 300px;" src="/images/peliculas/{{ $pelicula->image }}">
				</div>
			</div>
					
			<div class="col-md-8">
				{!!Form::model($pelicula,['route'=>['pelicula.update',$pelicula->id],'method'=>'PUT','files'=>true])!!}
					
					@include('admin/peliculas.forms.formUpdate')
					<button type="submit" class="btn btn-info">Actualizar pelicula</button>
					<a href="{{ route('pelicula.index') }}" class="btn btn-warning">Cancelar</a> 

				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
@include('includes.footer')	
@endsection