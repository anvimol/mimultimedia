@extends('layouts.app')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_series.png') }}');">
    
</div>


<div class="main main-raised">
	<div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de discos de almacenamiento</h2>
			
			<a href="{{ route('disk.create') }}" class="btn btn-primary">Nuevo disco</a>
            <div class="team">
                <div class="row">
					<table class="table">
						<tr>
							<th class="text-center">ID</th>
							<th class="col-md-4 text-center">Nombre</th>
							<th class="text-center">Opciones</th>
						</tr>
						@foreach($discos as $disco)
							<tr>
								<td>{{ $disco->id }}</td>
								<td>{{ $disco->name }}</td>

								<td class="td-actions text-right">
                                    {!!Form::open(['route'=>['disk.destroy',$disco->id],'method'=>'POST'])!!}
                                        {{ method_field('DELETE') }}
                                        {!!link_to_route('disk.edit',$title='Editar',$parameters=$disco->id, $attributes=['class'=>'btn btn-info btn-round'])!!}
                                        <button type="submit" class="btn btn-danger btn-round">
                                            Eliminar
                                        </button>
                                    {{Form::Close()}}
                                    
                                </td>
								
							</tr>
						@endforeach
					</table>
					<br>
					{{$discos->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')

@endsection

