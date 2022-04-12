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
        $data['dosens']= [];
        $dataset = Dosen::orderBy('id','desc')->get();

       foreach ($dataset as $key => $e) {
            switch ($e->c1) {
                case 1:
                    $e->c1 = '<55(SK)';
                    break;
                case 2:
                    $e->c1 = '55-65(K)';
                    break;
                case 3:
                    $e->c1 = '66-75(C)';
                    break;
                case 4:
                    $e->c1 = '76-90(B)';
                    break;
                case 5:
                    $e->c1 = '>90(SB)';
                    break;
                }

            switch ($e->c2) {
                case 1:
                    $e->c2 = '<25(SK)';
                    break;
                case 2:
                    $e->c2 = '>25-28,9(K)';
                    break;
                case 3:
                    $e->c2 = '29-33,9(C)';
                    break;
                case 4:
                    $e->c2 = '34-37(B)';
                    break;
                case 5:
                    $e->c2 = '>37(SB)';
                    break;
                }

            switch ($e->c3) {
                case 1:
                    $e->c3 = '0-55(SK)';
                    break;
                case 2:
                    $e->c3 = '56-65(K)';
                    break;
                case 3:
                    $e->c3 = '66-75(C)';
                    break;
                case 4:
                    $e->c3 = '76-90(B)';
                    break;
                case 5:
                    $e->c3 = '91-100(SB)';
                    break;
                }

            switch ($e->c4) {
                case 1:
                    $e->c4 = '0-55(SK)';
                    break;
                case 2:
                    $e->c4 = '56-65(K)';
                    break;
                case 3:
                    $e->c4 = '66-75(C)';
                    break;
                case 4:
                    $e->c4 = '76-90(B)';
                    break;
                case 5:
                    $e->c4 = '91-100(SB)';
                    break;
                }

            switch ($e->c5) {
                case 1:
                    $e->c5 = '0(SK)';
                    break;
                case 2:
                    $e->c5 = '1(K)';
                    break;
                case 3:
                    $e->c5 = '2(C)';
                    break;
                case 4:
                    $e->c5 = '3(B)';
                    break;
                case 5:
                    $e->c5 = '>4(SB)';
                    break;
                }

            array_push($data['dosens'],$e);
        }

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
