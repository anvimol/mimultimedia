<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public function disk()
    {
    	return $this->belongsTo(Disk::class);
    }
}
