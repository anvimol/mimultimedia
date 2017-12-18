<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Pelicula;
use App\Music;

class TestController extends Controller
{
	public function index()
    {
    	return view('front.index');
    }

    public function series()
    {
    	$series = Serie::paginate(9);
    	return view('front.series')->with(compact('series'));
    }

    public function peliculas()
    {
    	$peliculas = Pelicula::paginate(9);
    	return view('front.peliculas')->with(compact('peliculas'));
    }

    public function musicas()
    {
    	$musicas = Music::paginate(9);
    	return view('front.musicas')->with(compact('musicas'));
    }
}
