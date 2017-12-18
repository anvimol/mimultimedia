@extends('layouts.front')

@section('title', 'Series')

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
<div class="header header-filter" style="background-image: url('{{ asset('/img/collage_serie_front2.jpg') }}')">
    
</div>

<div class="main main-raised">
    <div class="container">
        

        <div class="section text-center">
            <h2 class="title titulo">SERIES DISPONIBLES</h2>

            <div class="team">
                <div class="row">
                    @foreach ($series as $serie)
                        <div class="col-md-4">
                            <div class="team-player">
                                <a href="{{ route('serie.show',$serie->id) }}"><img src="images/series/{{$serie->image}}" alt="Thumbnail Image" class="img-raised" height="250"></a>
                                
                                <h4 class="title">
                                    <a href="{{ route('serie.show',$serie->id) }}">{{ $serie->title }}</a>
                                    <br />
                                    <small class="text-muted">{{ $serie->disk->name }}</small>
                                </h4>

                                
                                <p class="description">{{ str_limit($serie->sinopsis, $limit = 150, $end = '...') }}</p>
                                
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <div class="text-center">
                    {{ $series->links() }}
                </div> 
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection




