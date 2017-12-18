@extends('layouts.app')

@section('title', 'Listado de peliculas')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_cine.jpg') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title titulo">Listado de Peliculas</h2>

            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('pelicula.create') }}" class="btn btn-primary btn-round">Nueva pelicula</a>
                    </div>
                    <div class="col-md-6">
                        @include('admin.peliculas.search')
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-1 text-center">Imagen</th>
                            <th class="col-md-2 text-center">Titulo</th>
                            <th class="col-md-1 text-center">Año</th>
                            <th class="col-md-1 text-center">Director</th>
                            <th class="text-center">País</th>
                            <th class="text-center">Disco</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peliculas as $pelicula)
                            <tr><td>
									@if ($pelicula->image == "" || $pelicula->image == null)
										<img class="img-responsive" style="width: 50px;" src="/img/peliculas-TV-.jpg">
									@else
										<img class="img-responsive" style="width: 50px;" src="images/peliculas/{{$pelicula->image}}">					
									@endif
								</td>
                                <td>{{ $pelicula->title }}</td>
                                <td>{{ $pelicula->year }}</td>
                                <td>{{ $pelicula->director }}</td>
                                <td>{{ $pelicula->country }}</td>
                                <td>{{ $pelicula->name }}</td>
                                <td class="td-actions text-center">
                                    <form method="POST" action="{{ url('pelicula/' . $pelicula->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="{{ url('pelicula/' . $pelicula->id . '/edit') }}" rel="tooltip" title="Editar pelicula" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar pelicula" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>

                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $peliculas->links() }}
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection



