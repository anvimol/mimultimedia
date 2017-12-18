@extends('layouts.front')

@section('title', 'Musica')

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
<div class="header header-filter" style="background-image: url('{{ asset('/img/collage_musica_front3.jpg') }}')">
    
</div>

<div class="main main-raised">
    <div class="container">
        

        <div class="section text-center">
            <h2 class="title titulo">MUSICA DISPONIBLES</h2>

            <div class="team">
                <div class="row">
                    @foreach ($musicas as $musica)
                        <div class="col-md-4">
                            <div class="team-player">
                                <a href="{{ route('musica.show',$musica->id) }}"><img src="images/discos/{{$musica->image}}" alt="Thumbnail Image" class="img-raised" height="250"></a>
                                
                                <h4 class="title">
                                    <a href="{{ route('musica.show',$musica->id) }}">{{ $musica->artist }}</a>
                                    <br><a href="{{ route('musica.show',$musica->id) }}">{{ $musica->title }}</a>
                                    <br><small class="text-muted">{{ $musica->disk->name }}</small>
                                </h4>

                                
                                <p class="description">{{ str_limit($musica->sinopsis, $limit = 150, $end = '...') }}</p>
                                
                            </div>
                        </div>
                    @endforeach
                    
                    
                </div>
                <div class="text-center">
                    {{ $musicas->links() }}
                </div> 
            </div>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection