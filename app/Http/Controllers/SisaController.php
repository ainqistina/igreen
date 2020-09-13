<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Exports\SisaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Sisa;
use Barryvdh\DomPDF\Facade;
use PDF;

class SisaController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = DB::table('sisas')
                    ->join('jalans', 'sisas.jalan', '=', 'jalans.id')
                    ->join('tamen', 'sisas.taman', '=', 'tamen.id')
                    ->select('sisas.id','sisas.serahan', 'sisas.jumlah_serahan', 'sisas.terima', 'sisas.jumlah_terima', 'tamen.taman', 'jalans.jalan','sisas.sub_sisa', 'sisas.frekuensi', 'sisas.hari', 'sisas.lokasi', 'sisas.jenis_lokasi', 'sisas.unit', 'sisas.saiz_bin', 'sisas.bil_tong', 'sisas.catatan')
                    ->get();
        return view('cariSisa')->with('data', $index);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jalan = DB::table('jalans')->get();
        $taman = DB::table('tamen')->get();
        $data = array('jalan' => $jalan, 'taman' => $taman);
        return view('sisa')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'serahan' => ['required'],
            'jumlah_serahan' => ['required'],
            'terima' => ['required'],
            'jumlah_terima' => ['required'],
            'taman' => ['required','string'],
            'jalan' => ['required','string'],
            'sub_sisa' => ['required','string'],
            'frekuensi' => ['required','string'],
            'hari' => ['required','string'],
            'lokasi' => ['required','string'],
            'jenis_lokasi' => ['required','string'],
            'unit' => ['required'],
            'saiz_bin' => ['required','string'],
            'bil_tong' => ['required'],
            'catatan' => [],
        ]);

        DB::table('sisas')->insert([$validate]);
        if (View::exists('cariSisa'))
        {
            $request->session()->flash('save', 'Data berjaya disimpan!');
            return redirect()->action('SisaController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single = DB::table('sisas')
                    ->join('jalans', 'jalans.id', '=', 'sisas.jalan')
                    ->join('tamen', 'tamen.id', '=', 'sisas.taman')
                    ->select('sisas.id', 'sisas.serahan', 'sisas.jumlah_serahan', 'sisas.terima', 'sisas.jumlah_terima','tamen.id as tamanid', 'tamen.taman', 'jalans.id as jalanid', 'jalans.jalan', 'sisas.sub_sisa', 'sisas.frekuensi', 'sisas.hari', 'sisas.lokasi', 'sisas.jenis_lokasi', 'sisas.unit', 'sisas.saiz_bin', 'sisas.bil_tong', 'sisas.catatan')
                    ->where('sisas.id', $id)
                    ->first();

        $tmn = DB::table('tamen')
                    ->select('tamen.*')
                    ->get();

        $jalan = DB::table('jalans')
                    ->select('jalans.id', 'jalans.jalan')
                    ->where('taman_fk', $single->tamanid)
                    ->get();

        return view('editSisa')->with(['data' => $single, 'dataTaman' => $tmn, 'dataJalan' => $jalan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'serahan' => ['required'],
            'jumlah_serahan' => ['required'],
            'terima' => ['required'],
            'jumlah_terima' => ['required'],
            'taman' => ['string'],
            'jalan' => ['string'],
            'sub_sisa' => ['string'],
            'frekuensi' => ['string'],
            'hari' => ['string'],
            'lokasi' => ['string'],
            'jenis_lokasi' => ['string'],
            'unit' => ['required'],
            'saiz_bin' => ['string'],
            'bil_tong' => ['required'],
            'catatan' => [],
        ]);

        $update = DB::table('sisas')->where('id', $id)->update([
            'serahan' => $validate['serahan'],
            'jumlah_serahan' => $validate['jumlah_serahan'],
            'terima' => $validate['terima'],
            'jumlah_terima' => $validate['jumlah_terima'],
            'taman' => $validate['taman'],
            'jalan' => $validate['jalan'],
            'sub_sisa' => $validate['sub_sisa'],
            'frekuensi' => $validate['frekuensi'],
            'hari' => $validate['hari'],
            'lokasi' => $validate['lokasi'],
            'jenis_lokasi' => $validate['jenis_lokasi'],
            'unit' => $validate['unit'],
            'saiz_bin' => $validate['saiz_bin'],
            'bil_tong' => $validate['bil_tong'],
            'catatan' => $validate['catatan'],
        ]);

        if($update == true) {
            $request->session()->flash('update', 'Data berjaya diubah!');
            return redirect()->route('cariSisa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $del = DB::table('sisas')->where('id',$id)->delete();
        $request->session()->flash('delete', 'Data berjaya dipadam!');
        // if($del == true) {
        //     return redirect()->route('sisa');
        // }
    }

    public function downloadPDF($id) {
        $serahan = DB::table('sisas')
                ->join('jalans', 'sisas.jalan', '=', 'jalans.id')
                ->join('tamen', 'sisas.taman', '=', 'tamen.id')
                ->select('sisas.id','sisas.serahan', 'sisas.jumlah_serahan', 'sisas.terima', 'sisas.jumlah_terima', 'tamen.taman', 'jalans.jalan','sisas.sub_sisa', 'sisas.frekuensi', 'sisas.hari', 'sisas.lokasi', 'sisas.jenis_lokasi', 'sisas.unit', 'sisas.saiz_bin', 'sisas.bil_tong', 'sisas.catatan')
                ->first();
        $pdf = Facade::loadView('sisaPDF', compact('serahan'));
        // $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('pengurusan_sisa_pepejal.pdf');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function sisaExport()
    {
        return Excel::download(new SisaExport, 'pengurusan_sisa_pepejal.xlsx');
    }
}
