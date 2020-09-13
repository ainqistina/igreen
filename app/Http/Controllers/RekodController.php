<?php

namespace App\Http\Controllers;

use App\Console\Commands\SendEmails;
use App\Notifications\notisRekod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Rekod;
use App\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class RekodController extends Controller
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
        $index = DB::table('rekod')
                ->join('jalans', 'rekod.jalan', '=', 'jalans.id')
                ->join('tamen', 'rekod.taman', '=', 'tamen.id')
                ->select('rekod.id', 'jalans.jalan', 'tamen.taman', 'rekod.terima_ccc', 'rekod.tamat_ccc', 'rekod.notis', 'rekod.status_sisa', 'rekod.status_rumput', 'rekod.status_longkang')
                ->get();
        return view('cariRekod')->with('data', $index);
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
        return view('rekod')->with($data);
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
            'jalan' => ['required'],
            'taman' => ['required'],
            'terima_ccc' => ['required'],
            'tamat_ccc' => ['required'],
            'notis' => ['required'],
            'status_sisa' => ['required'],
            'status_rumput' => ['required'],
            'status_longkang' => ['required'],
        ]);

        DB::table('rekod')->insert([$validate]);
        if (View::exists('cariRekod'))
        {
            $request->session()->flash('save', 'Data berjaya disimpan!');
            return redirect()->action('RekodController@index');
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
        $single = DB::table('rekod')
                    ->join('jalans', 'jalans.id', '=', 'rekod.jalan')
                    ->join('tamen', 'tamen.id', '=', 'rekod.taman')
                    ->select('rekod.id', 'tamen.id as tamanid', 'tamen.taman', 'jalans.id as jalanid', 'jalans.jalan' , 'rekod.terima_ccc', 'rekod.tamat_ccc', 'rekod.notis', 'rekod.status_sisa','rekod.status_rumput', 'rekod.status_longkang')
                    ->where('rekod.id', $id)
                    ->first();

        $dataTaman = DB::table('tamen')
                    ->select('tamen.*')
                    ->get();

        $dataJalan = DB::table('jalans')
                    ->select('jalans.id', 'jalans.jalan')
                    ->where('taman_fk', $single->tamanid)
                    ->get();

        return view('editRekod')->with(['data' => $single, 'dataTaman' => $dataTaman, 'dataJalan' => $dataJalan]);
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
            'jalan' => ['string'],
            'taman' => ['string'],
            'terima_ccc' => ['required'],
            'tamat_ccc' => ['required'],
            'notis' => ['required'],
            'status_sisa' => ['string'],
            'status_rumput' => ['string'],
            'status_longkang' => ['string'],
        ]);

        $update = DB::table('rekod')->where('id', $id)->update([
            'jalan' => $validate['jalan'],
            'taman' => $validate['taman'],
            'terima_ccc' => $validate['terima_ccc'],
            'tamat_ccc' => $validate['tamat_ccc'],
            'notis' => $validate['notis'],
            'status_sisa' => $validate['status_sisa'],
            'status_rumput' => $validate['status_rumput'],
            'status_longkang' => $validate['status_longkang'],
        ]);

        if($update == true) {
            $request->session()->flash('update', 'Data berjaya diubah!');
            return redirect()->route('cariRekod');
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
        $del = DB::table('rekod')->where('id',$id)->delete();
        $request->session()->flash('delete', 'Data berjaya dipadam!');
        // if($del == true) {
        //     return redirect()->route('sisa');
        // }
    }

    /**
     * Notification the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notification()
    {
        $date = date('Y-m-d');

        $info = DB::table('rekod')
            ->join('jalans', 'rekod.jalan', '=', 'jalans.id')
            ->join('tamen', 'rekod.taman', '=', 'tamen.id')
            ->select('jalans.jalan', 'tamen.taman', 'rekod.tamat_ccc')
            ->where('notis', $date)
            ->get();

        if ($info) {
            # code...
            if ($info->count() > 0) {
                # code...
                $id = DB::table('users')->pluck('id');
                $user = User::find($id);
                Notification::send($user, new notisRekod($info));
            }
        }

    }
}
