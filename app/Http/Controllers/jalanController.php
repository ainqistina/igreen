<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class jalanController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $all = DB::table('jalans')->get();
        $taman = DB::table('tamen')->get();
        $all = DB::table('tamen')
                ->join('jalans', 'jalans.taman_fk', '=', 'tamen.id')
                ->select('tamen.taman','jalans.id','jalans.jalan')
                ->get();
        return view('jalan')
            ->with('data', $all)
            ->with('taman', $taman);
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
            'taman_fk' => ['string'],
            'jalan' => ['string'],
        ]);

        DB::table('jalans')->insert([$validate]);
        if (View::exists('jalan'))
        {
            $request->session()->flash('save', 'Data berjaya disimpan!');
            return redirect()->route('jalan');
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
        $single = DB::table('jalans')->where('id', $id)->first();
        return view('editJalan')->with('data', $single);
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
            'jalan' => ['required'],
        ]);

        $update = DB::table('jalans')->where('id', $id)->update([
            'jalan' => $validate['jalan'],
        ]);

        if($update == true) {
            $request->session()->flash('update', 'Data berjaya diubah!');
            return redirect()->route('jalan');
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
        $del = DB::table('jalans')->where('id',$id)->delete();
        $request->session()->flash('delete', 'Data berjaya dipadam!');
        // if($del == true) {
        //     return redirect()->route('jalan');
        // }
    }

    public function detail($taman) {
        // $all = DB::table('jalans')->where('taman_fk', $taman)->pluck('jalan');
        $all = DB::table('jalans')
                ->join('tamen', 'jalans.taman_fk', '=', 'tamen.id')
                ->where('taman_fk', $taman)
                ->pluck('jalans.jalan', 'jalans.id');

        return response()->json($all);
    }
}
