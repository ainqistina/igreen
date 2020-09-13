<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Exports\UsersExport;
use App\Exports\AwamExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Awam;
use Barryvdh\DomPDF\Facade;

class AwamController extends Controller
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
        $index = DB::table('awams')
                ->join('tamen', 'awams.taman', '=', 'tamen.id')
                ->join('jalans', 'awams.jalan', '=', 'jalans.id')
                ->select('awams.id', 'awams.serahan', 'awams.jumlah_serahan', 'awams.terima', 'awams.jumlah_terima', 'tamen.taman', 'jalans.jalan', 'awams.sub_awam', 'awams.jenis_sub', 'awams.unit', 'awams.jenis', 'awams.frekuensi', 'awams.catatan')
                ->get();
        return view('cariAwam')->with('data', $index);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taman = DB::table('tamen')->get();
        $data = array('taman' => $taman);
        return view('awam')->with($data);
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
            'taman' => ['required'],
            'jalan' => ['required'],
            'sub_awam' => ['required'],
            'jenis_sub' => ['required'],
            'unit' => ['required'],
            'jenis' => ['required'],
            'frekuensi' => ['required'],
            'catatan' => []
        ]);

        DB::table('awams')->insert([$validate]);
        if (View::exists('cariAwam'))
        {
            return redirect()->action('AwamController@index');
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
        $single = DB::table('awams')
                    ->join('jalans', 'jalans.id', '=', 'awams.jalan')
                    ->join('tamen', 'tamen.id', '=', 'awams.taman')
                    ->select('awams.id', 'awams.serahan', 'awams.jumlah_serahan', 'awams.terima', 'awams.jumlah_terima','tamen.id as tamanid', 'tamen.taman', 'jalans.id as jalanid', 'jalans.jalan', 'awams.sub_awam', 'awams.jenis_sub', 'awams.unit', 'awams.jenis', 'awams.frekuensi', 'awams.catatan')
                    ->where('awams.id', $id)
                    ->first();

        $tmn = DB::table('tamen')
                    ->select('tamen.*')
                    ->get();

        $jalan = DB::table('jalans')
                    ->select('jalans.id', 'jalans.jalan')
                    ->where('taman_fk', $single->tamanid)
                    ->get();

        $all = [
            'data' => $single,
            'tmn' => $tmn,
            'jln' => $jalan,
        ];
        return view('editAwam')->with($all);
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
            'taman' => ['required'],
            'jalan' => ['required'],
            'sub_awam' => ['string'],
            'jenis_sub' => ['string'],
            'unit' => ['required'],
            'jenis' => ['string'],
            'frekuensi' => ['string'],
            'catatan' => []
        ]);

        $update = DB::table('awams')->where('id', $id)->update([
            'serahan' => $validate['serahan'],
            'jumlah_serahan' => $validate['jumlah_serahan'],
            'terima' => $validate['terima'],
            'jumlah_terima' => $validate['jumlah_terima'],
            'taman' => $validate['taman'],
            'jalan' => $validate['jalan'],
            'sub_awam' => $validate['sub_awam'],
            'jenis_sub' => $validate['jenis_sub'],
            'unit' => $validate['unit'],
            'jenis' => $validate['jenis'],
            'frekuensi' => $validate['frekuensi'],
            'catatan' => $validate['catatan'],
        ]);

        if($update == true) {
            return redirect()->route('cariAwam');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = DB::table('awams')->where('id',$id)->delete();
    }

    public function downloadAwamPDF($id) {
        // $serahan = Awam::find($id);
        $serahan = DB::table('awams')
                    ->join('tamen', 'awams.taman', '=', 'tamen.id')
                    ->join('jalans', 'awams.jalan', '=', 'jalans.id')
                    ->select('awams.id', 'awams.serahan', 'awams.jumlah_serahan', 'awams.terima', 'awams.jumlah_terima', 'tamen.taman', 'jalans.jalan', 'awams.sub_awam', 'awams.jenis_sub', 'awams.unit', 'awams.jenis', 'awams.frekuensi', 'awams.catatan')
                    ->first();
        $pdf = Facade::loadView('awamPDF', compact('serahan'));
        // $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('pembersihan_awam.pdf');
        // print_r($serahan);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function awamExport()
    {
        return Excel::download(new AwamExport, 'pembersihan_awam.xlsx');
    }
}
