@extends('layouts.front')

@section('title', 'Bienvenido a Mi Multimedia')

@section('body-class','landing-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_front.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title">Bienvenido a Mi Multimedia.</h1>
            </div>
            <div class="col-md-4">
            	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><a href="{{ route('peliculas') }}">PELICULAS</a></h3>
					</div>
					<div class="panel-body text-center">
						<a href="{{ route('peliculas') }}"><img class="img-responsive" style=" width: 350px;" src="/img/collage_cine_front2.jpg"></a>
					</div>
				</div>
			</div>
            <div class="col-md-4">
            	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><a href="{{ route('series') }}">SERIES</a></h3>
					</div>
					<div class="panel-body text-center">
						<a href="{{ route('series') }}"><img class="img-responsive" style=" width: 350px;" src="/img/collage_serie_front2.jpg"></a>
					</div>
				</div>
			</div>
            <div class="col-md-4">
            	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><a href="{{ route('musicas') }}">MUSICA</a></h3>
					</div>
					<div class="panel-body text-center">
						<a href="{{ route('musicas') }}"><img class="img-responsive" style=" width: 350px;" src="/img/collage_musica_front2.jpg"></a>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>


@endsection