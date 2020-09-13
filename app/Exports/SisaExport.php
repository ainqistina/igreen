<?php

namespace App\Exports;

use App\sisa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SisaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return  DB::table('sisas')
                    ->join('jalans', 'sisas.jalan', '=', 'jalans.id')
                    ->join('tamen', 'sisas.taman', '=', 'tamen.id')
                    ->select('sisas.serahan', 'sisas.jumlah_serahan', 'sisas.terima', 'sisas.jumlah_terima', 'tamen.taman', 'jalans.jalan','sisas.sub_sisa', 'sisas.frekuensi', 'sisas.hari', 'sisas.lokasi', 'sisas.jenis_lokasi', 'sisas.unit', 'sisas.saiz_bin', 'sisas.bil_tong', 'sisas.catatan')
                    ->get();
    }

    public function headings(): array
    {
        return [
            'Tarikh Serahan',
            'Jumlah Serahan',
            'Tarikh Terima',
            'Jumlah Terima',
            'Taman',
            'Jalan',
            'Sub Kategori',
            'Frekuensi',
            'Hari',
            'Lokasi',
            'Jenis Lokasi',
            'Unit',
            'Saiz Bin',
            'Bilangan Tong',
            'Catatan'
        ];
    }
}
