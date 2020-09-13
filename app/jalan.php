<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jalan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'taman_fk', 'jalan', 
    ];
}
