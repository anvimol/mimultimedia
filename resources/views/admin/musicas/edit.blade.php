@extends('layouts.app')

@section('title', 'Modificar disco')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_musica.jpg') }}');">
    
</div>
<div class="main main-raised">
	<div class="container">
		<div class="section">
			@include('errors.alerts.errorUser')

			<div class="col-md-4">
				<h2>{{ $musica->title }}</h2>
				<div class="product-block">
					<img class="img-responsive" style="width: 300px;" src="/images/discos/{{ $musica->image }}">
				</div>
			</div>
					
			<div class="col-md-8">
				{!!Form::model($musica,['route'=>['musica.update',$musica->id],'method'=>'PUT','files'=>true])!!}
					
					@include('admin.musicas.forms.formUpdate')
					

				{!!Form::close()!!}
			</div>
		</div>
	</div>
</div>
@include('includes.footer')	
@endsection