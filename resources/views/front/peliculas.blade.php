@extends('layouts.front')

@section('title', 'Cine')

@section('body-class','product-page')

{{-- @section('styles')

    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        /*ORDENAR PRODUCTOS PAG PRINCIPAL*/
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }

        .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }
    </style> 

@endsection  --}}

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/collage_cine_front2.jpg') }}')">
    
</div>

<div class="main main-raised">
    <div class="container">
        

        <div class="section text-center">
            <h2 class="title titulo">PELICULAS DISPONIBLES</h2>

            <div class="team">
                <div class="row">
                    @foreach ($peliculas as $pelicula)
                        <div class="col-md-4">
                            <div class="team-player">
                                <a href="{{ route('pelicula.show',$pelicula->id) }}"><img src="images/peliculas/{{$pelicula->image}}" alt="Thumbnail Image" class="img-raised" height="250"></a>
                                
                                <h4 class="title">
                                    <a href="{{ route('pelicula.show',$pelicula->id) }}">{{ $pelicula->title }}</a>
                                    <br />
                                    <small class="text-muted">{{ $pelicula->disk->name }}</small>
                                </h4>

                                
                                <p class="description">{{ str_limit($pelicula->sinopsis, $limit = 150, $end = '...') }}</p>
                                
                            </div>
                        </div>
                    @endforeach
                    
                    
                </div>
                <div class="text-center">
                    {{ $peliculas->links() }}
                </div> 
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection