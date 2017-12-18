@extends('layouts.app')

@section('title', 'Crear disco')

@section('body-class','product-page')

@section('content')    
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_series.png') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
			<h2 class="title text-center">Nuevo Disco</h2>
			@include('errors.alerts.errorUser')
			{!! Form::open(['route'=>'disk.store','method'=>'POST']) !!}
				@include('disk.forms.formDisks')
				<button type="submit" class="btn btn-info">Registrar disco</button>
				<a href="{{ route('disk.index') }}" class="btn btn-warning">Cancelar</a>  
			{!! Form::close() !!}
		</div>
	</div>
</div>
@include('includes.footer')

@endsection
