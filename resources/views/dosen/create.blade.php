@extends('layouts.app')
@section('title', 'Tambah Dosen')
@section('content-title', 'Tambah Dosen')
@section('content-subtitle', '-')
@section('content')
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('dosen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Dosen:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Dosen">
                    @error('nama')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>C1 Kriteria Kehadiran</label>
                    <select class="form-control" name="c1" placeholder="Kriteria Kehadiran">
                        <option value=""></option>
                        <option value="1">&lt;55 (Sangat Kurang)</option>
                        <option value="2">55-65 (Kurang)</option>
                        <option value="3">66-75 (Cukup)</option>
                        <option value="4">76-90 (Baik)</option>
                        <option value="5">>90 (Sangat Baik)</option>
                    </select>
                    @error('c1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>C2 Kriteria Kuesioner mahasiswa</label>
                    <select class="form-control" name="c2" placeholder="Kriteria Kuesioner mahasiswa">
                        <option value=""></option>
                        <option value="1">&lt;25 (Sangat Kurang)</option>
                        <option value="2">>25-28,9 (Kurang)</option>
                        <option value="3">29-33,9 (Cukup)</option>
                        <option value="4">34-37 (Baik)</option>
                        <option value="5">>37 (Sangat Baik)</option>
                    </select>
                    @error('c1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>C3 Kriteria Kedisiplinan</label>
                    <select class="form-control" name="c3" placeholder="Kriteria Kedisiplinan">
                        <option value=""></option>
                        <option value="1">0-55 (Sangat Kurang)</option>
                        <option value="2">56-65 (Kurang)</option>
                        <option value="3">66-75 (Cukup)</option>
                        <option value="4">76-90 (Baik)</option>
                        <option value="5">91-100 (Sangat Baik)</option>
                    </select>
                    @error('c1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>C4 Kriteria Kepemimpinan</label>
                    <select class="form-control" name="c4" placeholder="Kriteria Kepemimpinan">
                        <option value=""></option>
                        <option value="1">0-55 (Sangat Kurang)</option>
                        <option value="2">56-65 (Kurang)</option>
                        <option value="3">66-75 (Cukup)</option>
                        <option value="4">76-90 (Baik)</option>
                        <option value="5">91-100 (Sangat Baik)</option>
                    </select>
                    @error('c1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>C5 Kriteria Keaktifan penelitian</label>
                    <select class="form-control" name="c5" placeholder="Kriteria Keaktifan penelitian">
                        <option value=""></option>
                        <option value="1">0 (Sangat Kurang)</option>
                        <option value="2">1 (Kurang)</option>
                        <option value="3">2 (Cukup)</option>
                        <option value="4">3 (Baik)</option>
                        <option value="5">>4 (Sangat Baik)</option>
                    </select>
                    @error('c1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary ml-3">Tambah</button>
            </div>
        </div>
    </form>

@endsection
