@extends('layouts.app')

@section('title', 'Bienvenido a Mi Multimedia')

@section('body-class','landing-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_front.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="title">Bienvenido a la administración de Mi Multimedia.</h1>
            </div>
            <div class="col-md-2">
                <a href="/" title=""><button type="button" class="btn btn-info btn-lg">Volver</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center">PELICULAS</h3>
					</div>
					<div class="panel-body text-center">
						<a href="{{ route('pelicula.index') }}"><img class="img-responsive" style=" width: 350px;" src="/img/collage_cine_front2.jpg"></a>
					</div>
				</div>
			</div>
            <div class="col-md-4">
            	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><a href="{{ route('serie.index') }}">SERIES</a></h3>
					</div>
					<div class="panel-body text-center">
						<a href="{{ route('serie.index') }}"><img class="img-responsive" style=" width: 350px;" src="/img/collage_serie_front2.jpg"></a>
					</div>
				</div>
			</div>
            <div class="col-md-4">
            	<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center">MUSICA</h3>
					</div>
					<div class="panel-body text-center">
						<a href="{{ route('musica.index') }}"><img class="img-responsive" style=" width: 350px;" src="/img/collage_musica_front2.jpg"></a>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>


@endsection
