@extends('layouts.front')

@section('title', 'Modificar serie')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/collage_serie_front2.jpg') }}');">
    
</div>
<div class="main main-raised">
	<div class="container">
		<div class="section">
			@include('errors.alerts.errorUser')

			<div class="col-md-4">
				<div class="product-block">
					<img class="img-responsive" style="width: 400px;" src="/images/series/{{ $serie->image }}">
				</div>
			</div>
					
			<div class="col-md-8">
				<h1 class="titulo text-center">{{ $serie->title }}</h1>
				<div class="col-md-6">
					<h3 class="titulo">Año: {{ $serie->year }}</h3>
				</div>
				<div class="col-md-6">
					<h3 class="titulo">Temporadas: {{ $serie->temporada }}</h3>
				</div>
				<div class="col-md-12">
					<h3 class="titulo">País: {{ $serie->country }}</h3>
				</div>
				<div class="col-md-12">
					<h3 class="titulo">Director: {{ $serie->director }}</h3>
				</div>
				<div class="col-md-12">
					<h3 class="titulo">Reparto:</h3><p class="titulo">{{ $serie->actor }}</p> 
				</div>
				<div class="col-md-12">
					<h3 class="titulo">Sinopsis:</h3><p class="titulo">{{ $serie->sinopsis }}</p> 
				</div>
				<div class="col-md-6">
					<h3 class="titulo">Disco: {{ $serie->disk->name }}</h3>
				</div>
				<div class="col-md-6">
					<h3 class="titulo">Completa: {{ $serie->completed == 1 ? "SI" : "NO" }}</h3>
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')
@endsection