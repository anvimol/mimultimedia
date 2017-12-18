@extends('layouts.app')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_series.png') }}');">
    
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section">
			<h2 class="title text-center">Modificar disco</h2>
			{!!Form::model($disco,['route'=>['disk.update',$disco->id],'method'=>'PUT'])!!}
				@include('disk.forms.formDisks')
				<button type="submit" class="btn btn-info">Actualizar disco</button>
				<a href="{{ route('disk.index') }}" class="btn btn-warning">Cancelar</a>  
			{!!Form::close()!!}

		</div>
	</div>
</div>
@endsection