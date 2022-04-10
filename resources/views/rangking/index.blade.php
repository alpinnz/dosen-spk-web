@extends('layouts.app')
@section('title', 'Data Rangking')
@section('content-title', 'Data Rangking')
@section('content-subtitle', '-')
@section('content')
    <div class="box mt-4">
        <div class="box-header">
        </div>

        <div class="box-body">
            <table id="tabel" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosens as $key => $dosen)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $dosen->nama }}</td>
                            <td>{{ $dosen->c1 }}</td>
                            <td>{{ $dosen->c2 }}</td>
                            <td>{{ $dosen->c3 }}</td>
                            <td>{{ $dosen->c4 }}</td>
                            <td>{{ $dosen->c5 }}</td>
                            <td>{{ $dosen->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
