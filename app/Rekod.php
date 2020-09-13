<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekod extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jalan', 'taman', 'terima_ccc', 'tamat_ccc', 'notis', 'status_sisa', 'status_rumput', 'status_longkang'
    ];
}
