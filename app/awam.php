<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class awam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serahan', 'jumlah_serahan', 'terima', 'jumlah_terima', 'taman', 'jalan', 'sub_awam', 'jenis_sub', 'unit', 'jenis', 'frekuensi', 'catatan'
    ];
}
