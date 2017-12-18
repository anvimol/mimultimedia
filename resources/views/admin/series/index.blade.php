@extends('layouts.app')

@section('title', 'Listado de series')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/collage_series.png') }}');">
    
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title titulo">Listado de series</h2>

            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('serie.create') }}" class="btn btn-primary btn-round">Nueva serie</a>
                    </div>
                    <div class="col-md-6">
                        @include('admin.series.search')
                    </div>
                </div>
                    <hr>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-1 text-center">Imagen</th>
                            <th class="col-md-2 text-center">Titulo</th>
                            <th class="col-md-1 text-center">Año</th>
                            <th class="col-md-1 text-center">Temporada</th>
                            <th class="text-center">País</th>
                            <th class="text-center">Disco</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($series as $serie)
                            <tr><td>
									@if ($serie->image == "" || $serie->image == null)
										<img class="img-responsive" style="width: 50px;" src="/img/Series-TV-.jpg">
									@else
										<img class="img-responsive" style="width: 50px;" src="images/series/{{$serie->image}}">					
									@endif
								</td>
                                <td>{{ $serie->title }}</td>
                                <td>{{ $serie->year }}</td>
                                <td>{{ $serie->temporada }}</td>
                                <td>{{ $serie->country }}</td>
                                <td>{{ $serie->name }}</td>
                                <td class="td-actions text-center">
                                    <form method="POST" action="{{ url('serie/' . $serie->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="{{ url('serie/' . $serie->id . '/edit') }}" rel="tooltip" title="Editar serie" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar serie" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{ $series->links() }}
            </div>

        </div>
    </div>

</div>

@include('includes.footer')

@endsection