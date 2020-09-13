<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sisa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serahan', 'jumlah_serahan', 'terima', 'jumlah_terima', 'taman', 'jalan', 'sub_sisa', 'frekuensi', 'hari', 'lokasi', 'jenis_lokasi', 'unit', 'saiz_bin', 'bil_tong', 'catatan'
    ];
}
