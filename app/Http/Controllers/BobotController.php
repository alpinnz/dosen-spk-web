<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bobots = Bobot::orderBy('id','asc')->get();

        if($bobots->isEmpty()){
            $bobots = $this-> createDefault();
        }

        $data['bobots'] = [];

        foreach ($bobots as $key => $e) {
            switch ($e->id) {
                case 1:
                    $e->kriteria = 'C1 Kriteria Kehadiran';
                    break;
                case 2:
                    $e->kriteria = 'C2 Kriteria Kuesioner mahasiswa';
                    break;
                case 3:
                    $e->kriteria = 'C3 Kriteria Kedisiplinan';
                    break;
                case 4:
                    $e->kriteria = 'C4 Kriteria Kepemimpinan';
                    break;
                case 5:
                    $e->kriteria = 'C5 Kriteria Keaktifan penelitian';
                    break;
                }

            $e->bobot = $e->bobot * 100;

            array_push($data['bobots'],$e);
        }
        return view('bobot.index', $data);

    }

    public function createDefault()
    {
        $default = array(30, 40, 15, 10, 5);

        foreach ($default as $key => $e) {
            $bobot = new Bobot;
            $bobot->id = $key + 1;
            $bobot->bobot = $e / 100;
            $bobot->save();
        }

        $bobots = Bobot::orderBy('id','asc')->get();

        return $bobots;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bobot //bobot
     * @return \Illuminate\Http\Response
     */
    public function show(Bobot $bobot)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bobot //bobot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bobot $bobot)
    {
        switch ($bobot->id) {
            case 1:
                $bobot->kriteria = 'C1 Kriteria Kehadiran';
                break;
            case 2:
                $bobot->kriteria = 'C2 Kriteria Kuesioner mahasiswa';
                break;
            case 3:
                $bobot->kriteria = 'C3 Kriteria Kedisiplinan';
                break;
            case 4:
                $bobot->kriteria = 'C4 Kriteria Kepemimpinan';
                break;
            case 5:
                $bobot->kriteria = 'C5 Kriteria Keaktifan penelitian';
                break;
            }
        $bobot->bobot = $bobot->bobot * 100;

        $bobots = Bobot::orderBy('id','asc')->get();

        $use = 0;

        foreach ($bobots as $key => $e) {
            if($e -> id != $bobot -> id){
                $use += ($e -> bobot)*100;
            }
        }
        $max = 100 - $use;

        $data['bobot'] = $bobot;
        $data['use'] = $use;
        $data['max'] = $max;

        return view('bobot.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bobot //bobot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bobots = Bobot::orderBy('id','asc')->get();

        $use = 0;
        foreach ($bobots as $key => $e) {
            if($e -> id != $id){
                $use += ($e -> bobot)*100;
            }
        }
        $max = 100 - $use;

        $request->validate([
            'bobot' => ['required', 'integer', 'max:'.$max],
        ]);

        $bobot = Bobot::find($id);
        $bobot->bobot = $request->bobot / 100;
        $bobot->save();
        return redirect()->route('bobot.index')
        ->with('success','Bobot Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bobot //bobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bobot $bobot)
    {
    }
}
