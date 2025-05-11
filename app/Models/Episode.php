<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamps = false;
    protected $filallable = ['number'];
    protected $casts = ['watched' => 'boolean'];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
