@extends('layouts.app')

@section('title', 'Modificar serie')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_series.png') }}');">
    
</div>
<div class="main main-raised">
	<div class="container">
		<div class="section">
			@include('errors.alerts.errorUser')

			<div class="col-md-4">
				<h2>{{ $serie->title }}</h2>
				<div class="product-block">
					<img class="img-responsive" style="width: 300px;" src="/images/series/{{ $serie->image }}">
				</div>
			</div>
					
			<div class="col-md-8">
				{!!Form::model($serie,['route'=>['serie.update',$serie->id],'method'=>'PUT','files'=>true])!!}
					
					@include('admin.series.form.formEdit')
					<button type="submit" class="btn btn-info">Actualizar serie</button>
					<a href="{{ route('serie.index') }}" class="btn btn-warning">Cancelar</a> 

				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
@include('includes.footer')
@endsection