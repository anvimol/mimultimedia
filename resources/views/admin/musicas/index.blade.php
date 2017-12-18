@extends('layouts.app')

@section('title', 'Listado de peliculas')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_musica.jpg') }}');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title titulo">Listado de Musica</h2>

            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('musica.create') }}" class="btn btn-primary btn-round">Nuevo disco</a>
                    </div>
                    <div class="col-md-6">
                        @include('admin.musicas.search')
                    </div>
                </div>
                    <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-1 text-center">Imagen</th>
                            <th class="col-md-1 text-center">Artista</th>
                            <th class="col-md-2 text-center">Titulo</th>
                            <th class="col-md-1 text-center">Año</th>
                            <th class="text-center">País</th>
                            <th class="text-center">Disco</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($musicas as $musica)
                            <tr><td>
									@if ($musica->image == "" || $musica->image == null)
										<img class="img-responsive" style="width: 50px;" src="/img/peliculas-TV-.jpg">
									@else
										<img class="img-responsive" style="width: 50px;" src="images/discos/{{$musica->image}}">					
									@endif
								</td>
                                <td>{{ $musica->artist }}</td>
                                <td>{{ $musica->title }}</td>
                                <td>{{ $musica->year }}</td>
                                <td>{{ $musica->country }}</td>
                                <td>{{ $musica->name }}</td>
                                <td class="td-actions text-center">
                                    <form method="POST" action="{{ url('musica/' . $musica->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="{{ url('musica/' . $musica->id . '/edit') }}" rel="tooltip" title="Editar disco" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar disco" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>

                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $musicas->links() }}
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection



