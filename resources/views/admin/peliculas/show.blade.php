@extends('layouts.front')

@section('title', 'Modificar pelicula')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/collage_cine_front2.jpg') }}');">
    
</div>
<div class="main main-raised">
	<div class="container">
		<div class="section">
			@include('errors.alerts.errorUser')

			<div class="col-md-4">
				<div class="product-block">
					<img class="img-responsive" style="width: 400px;" src="/images/peliculas/{{ $pelicula->image }}">
				</div>
			</div>
					
			<div class="col-md-8">
				<h1 class="titulo text-center">{{ $pelicula->title }}</h1>
				<div class="col-md-6">
					<h3 class="titulo">Año: {{ $pelicula->year }}</h3>
				</div>
				<div class="col-md-6">
					<h3 class="titulo">País: {{ $pelicula->country }}</h3>
				</div>
				<div class="col-md-12">
					<h3 class="titulo">Director: {{ $pelicula->director }}</h3>
				</div>
				<div class="col-md-12">
					<h3 class="titulo">Reparto:</h3><p class="titulo">{{ $pelicula->actor }}</p> 
				</div>
				<div class="col-md-12">
					<h3 class="titulo">Sinopsis:</h3><p class="titulo">{{ $pelicula->sinopsis }}</p> 
				</div>
				<div class="col-md-6">
					<h3 class="titulo">Disco: {{ $pelicula->disk->name }}</h3>
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')
@endsection