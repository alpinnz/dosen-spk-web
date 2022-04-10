<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class RangkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dosens'] = Dosen::orderBy('id','desc')->get();

        //TODO  Temp min/max column
        $column = array(0,0,0,0,0);

        foreach ($data['dosens'] as $dosen ) {
            //TODO  C! Benefit ambil angka tertinggi
            $column[0] = $column[0] < $dosen->c1 ? $dosen->c1: $column[0] ;
            //TODO  C2 Benefit ambil angka tertinggi
            $column[1] = $column[1] < $dosen->c2 ? $dosen->c2: $column[1] ;
            //TODO  C3 Benefit ambil angka tertinggi
            $column[2] = $column[2] < $dosen->c3 ? $dosen->c3: $column[2] ;
            //TODO  C4 Benefit ambil angka tertinggi
            $column[3] = $column[3] < $dosen->c4 ? $dosen->c4: $column[3] ;
            //TODO  C5 Benefit ambil angka tertinggi
            $column[4] = $column[4] < $dosen->c5 ? $dosen->c5: $column[4] ;
        }

        $ternomalisasi = [];

        foreach ($data['dosens'] as $dosen ) {
            $dosen->c1 = $dosen->c1 / $column[0];
            $dosen->c2 = $dosen->c2 / $column[1];
            $dosen->c3 = $dosen->c3 / $column[2];
            $dosen->c4 = $dosen->c4 / $column[3];
            $dosen->c5 = $dosen->c5 / $column[4];
            array_push($ternomalisasi,$dosen);
        }

        $bobot = array(0.3,0.4,0.15,0.10,0.5);
        $ternomalisasiXbobot = [];

        foreach ($ternomalisasi as $dosen ) {
            $dosen->c1 = $dosen->c1 * $bobot[0];
            $dosen->c2 = $dosen->c2 * $bobot[1];
            $dosen->c3 = $dosen->c3 * $bobot[2];
            $dosen->c4 = $dosen->c4 * $bobot[3];
            $dosen->c5 = $dosen->c5 * $bobot[4];
            $dosen->jumlah = $dosen->c1 + $dosen->c2+$dosen->c3+$dosen->c4+ $dosen->c5 * $bobot[4];
            echo($dosen->nama);
            echo('<br>');
            echo($dosen->jumlah);
            echo('<br>');
            array_push($ternomalisasiXbobot,$dosen);
        }



        $data['dosens'] = $ternomalisasiXbobot;



        return view('rangking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
