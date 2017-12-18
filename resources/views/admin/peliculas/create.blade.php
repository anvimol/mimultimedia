@extends('layouts.app')

@section('title', 'Nueva pelicula')

@section('body-class','product-page')

@section('content')    
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_cine.jpg') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
			<h2 class="title text-center titulos">Nueva pelicula</h2>
			@include('errors.alerts.errorUser')
			{!! Form::open(['route'=>'pelicula.store','method'=>'POST','files'=>true]) !!}
				@include('admin.peliculas.forms.formPelicula')
				<button type="submit" class="btn btn-info">Registrar pelicula</button>
				<a href="{{ route('pelicula.index') }}" class="btn btn-warning">Cancelar</a>  
			{!! Form::close() !!}
		</div>
	</div>
</div>
@include('includes.footer')

@endsection
