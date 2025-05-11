<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Series extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];


    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('name');
        });

        self::addGlobalScope('user', function (Builder $builder) {
            if (Auth::check()) {
                $builder->where('user_id', Auth::user()->id);
            }
        });
    }
}
