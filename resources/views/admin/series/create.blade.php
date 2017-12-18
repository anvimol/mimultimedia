@extends('layouts.app')

@section('title', 'Nueva serie')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_series.png') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar nuevas series</h2>
			@include('errors.alerts.errorUser')
			{!! Form::open(['route'=>'serie.store','method'=>'POST','files'=>true]) !!}
				@include('admin.series.form.formCreate')
				<button type="submit" class="btn btn-info">Registrar serie</button>
				<a href="{{ route('serie.index') }}" class="btn btn-warning">Cancelar</a> 
			{!! Form::close() !!}
		</div>
	</div>
</div>
@include('includes.footer')
@endsection