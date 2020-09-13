<?php

namespace App\Exports;

use App\awam;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AwamExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('awams')
                ->join('tamen', 'awams.taman', '=', 'tamen.id')
                ->join('jalans', 'awams.jalan', '=', 'jalans.id')
                ->select('awams.serahan', 'awams.jumlah_serahan', 'awams.terima', 'awams.jumlah_terima', 'tamen.taman', 'jalans.jalan', 'awams.sub_awam', 'awams.jenis_sub', 'awams.unit', 'awams.jenis', 'awams.frekuensi', 'awams.catatan')
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
            'Sub Awam',
            'Jenis Sub',
            'Unit',
            'Jenis',
            'Frekuensi',
            'Catatan'
        ];
    }
}
