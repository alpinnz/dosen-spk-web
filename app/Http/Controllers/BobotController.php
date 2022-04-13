<?php

namespace App\Http\Controllers;

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

        $bobots = Dosen::orderBy('id','asc')->get();

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

            array_push($data['bobots'],$e);
        }


        return view('bobot.index', $data);
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
        $request->validate([
            'nama' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'c5' => 'required',
        ]);

        $dosen = new Dosen;
        $dosen->nama = $request->nama;
        $dosen->c1 = $request->c1;
        $dosen->c2 = $request->c2;
        $dosen->c3 = $request->c3;
        $dosen->c4 = $request->c4;
        $dosen->c5 = $request->c5;
        $dosen->save();
        return redirect()->route('dosen.index')
        ->with('success','Dosen has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        return view('dosen.show',compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit',compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'c5' => 'required',
        ]);

        $dosen = Dosen::find($id);
        $dosen->nama = $request->nama;
        $dosen->c1 = $request->c1;
        $dosen->c2 = $request->c2;
        $dosen->c3 = $request->c3;
        $dosen->c4 = $request->c4;
        $dosen->c5 = $request->c5;
        $dosen->save();
        return redirect()->route('dosen.index')
        ->with('success','Dosen Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')
        ->with('success','Dosen has been deleted successfully');
    }
}
