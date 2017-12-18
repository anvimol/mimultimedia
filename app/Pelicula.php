<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public function disk()
    {
    	return $this->belongsTo(Disk::class);
    }
}
