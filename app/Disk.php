<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Disk extends Model
{
    public function series()
    {
    	return $this->hasMany(Serie::class);
    }

    public function peliculas()
    {
    	return $this->hasMany(Pelicula::class);
    }

    public function musicas()
    {
    	return $this->hasMany(Music::class);
    }
}
