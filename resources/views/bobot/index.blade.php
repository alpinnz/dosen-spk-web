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
                    @foreach ($bobots as $key => $e)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $e->kriteria }}</td>
                            <td>{{ $e->bobot }}%</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('bobot.edit', $e->id) }}">Edit</a>
                                @csrf

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
