<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dosens'] = Dosen::orderBy('id','desc')->get();
        return view('dosen.index', $data);
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
