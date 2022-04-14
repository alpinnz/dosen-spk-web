<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Dosen;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perhitunganPage()
    {
        $data['dosens'] = $this->getData();
        $data['ternomalisasi'] = $this->getTernomalisasi($this->getData());
        $data['ternomalisasiXbobot'] = $this->getTernomalisasiXbobot($this->getTernomalisasi($this->getData()));

        return view('perhitungan.index', $data);
    }

    public function RangkingPage()
    {
        $data['dosens'] = $this->getTernomalisasiXbobot($this->getTernomalisasi($this->getData()));
        return view('rangking.index', $data);
    }

    public function getBobot()
    {
        $data = Bobot::orderBy('id','asc')->get();
        $bobots = [];

        foreach ($data as $key => $e) {
            array_push($bobots, $e -> bobot);
        }

        return $bobots;

    }

    public function getData()
    {
        return Dosen::orderBy('id','desc')->get();
    }

    public function getTernomalisasi($data)
    {
        $ternomalisasi = [];

        //TODO  Temp min/max column
        $column = array(0,0,0,0,0);

        foreach ($data as $dosen ) {
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

        foreach ($data as $dosen ) {
            $dosen->c1 = $dosen->c1 / $column[0];
            $dosen->c2 = $dosen->c2 / $column[1];
            $dosen->c3 = $dosen->c3 / $column[2];
            $dosen->c4 = $dosen->c4 / $column[3];
            $dosen->c5 = $dosen->c5 / $column[4];
            array_push($ternomalisasi,$dosen);
        }

        return $ternomalisasi;
    }

    public function getTernomalisasiXbobot($ternomalisasi)
    {
        // Temp
        $bobot = $this -> getBobot();
        $ternomalisasiXbobot = [];

        foreach ($ternomalisasi as $dosen ) {
            $dosen->c1 = $dosen->c1 * $bobot[0];
            $dosen->c2 = $dosen->c2 * $bobot[1];
            $dosen->c3 = $dosen->c3 * $bobot[2];
            $dosen->c4 = $dosen->c4 * $bobot[3];
            $dosen->c5 = $dosen->c5 * $bobot[4];
            $dosen->jumlah = $dosen->c1 + $dosen->c2+$dosen->c3+$dosen->c4+ $dosen->c5;
            array_push($ternomalisasiXbobot,$dosen);
        }

        usort($ternomalisasiXbobot,function($a,$b){
            return $b->jumlah <=> $a->jumlah;
        });

        return $ternomalisasiXbobot;
    }
}
