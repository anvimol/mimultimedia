@extends('layouts.front')

@section('title', 'Modificar musica')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/collage_musica_front3.jpg') }}');">
    
</div>
<div class="main main-raised">
	<div class="container">
		<div class="section">
			@include('errors.alerts.errorUser')

			<div class="col-md-4">
				<div class="product-block">
					<img class="img-responsive" style="width: 400px;" src="/images/discos/{{ $musica->image }}">
				</div>
			</div>
					
			<div class="col-md-8">
				<h1 class="titulo text-center">{{ $musica->artist }}</h1>
				<div class="col-md-12">
					<h3 class="titulo">Album: {{ $musica->title }}</h3>
				</div>
				<div class="col-md-6">
					<h3 class="titulo">Año: {{ $musica->year }}</h3>
				</div>
				<div class="col-md-6">
					<h3 class="titulo">País: {{ $musica->country }}</h3>
				</div>
				<div class="col-md-12">
					<h3 class="titulo">Canciones:</h3><p class="titulo">{{ $musica->song }}</p> 
				</div>
				<div class="col-md-6">
					<h3 class="titulo">Disco: {{ $musica->disk->name }}</h3>
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')
@endsection