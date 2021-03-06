@extends('layouts.app')

@section('title', 'Nuevo disco')

@section('body-class','product-page')

@section('content')    
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_musica.jpg') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
			<h2 class="title text-center">Nuevo disco</h2>
			@include('errors.alerts.errorUser')
			{!! Form::open(['route'=>'musica.store','method'=>'POST','files'=>true]) !!}
				@include('admin.musicas.forms.formMusica')
				 
			{!! Form::close() !!}
		</div>
	</div>
</div>
@include('includes.footer')

@endsection
