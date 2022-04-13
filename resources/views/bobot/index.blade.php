@extends('layouts.app')
@section('title', 'Data Bobot')
@section('content-title', 'Data Bobot')
@section('content-subtitle', '-')
@section('content')
    <div class="box mt-4">
        <div class="box-header">
            <h3 class="box-title">Tabel </h3>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="box-body">
            <table id="tabel" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosens as $key => $dosen)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $dosen->kriteria }}</td>
                            <td>{{ $dosen->bobot }}</td>
                            <td>
                                <form action="{{ route('dosen.destroy', $dosen->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('dosen.edit', $dosen->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
