@extends('layouts.app')
@section('title', 'Edit Dosen')
@section('content-title', 'Edit Dosen')
@section('content-subtitle', '-')
@section('content')
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Dosen:</strong>
                    <input type="text" name="nama" value="{{ $dosen->nama }}" class="form-control"
                        placeholder="Nama Dosen">
                    @error('nama')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>C1 Kriteria Kehadiran</label>
                    <select class="form-control" name="c1" placeholder="Kriteria Kehadiran">
                        <option value="1" @if (1 == old('myselect', $dosen->c1)) selected="selected" @endif>&lt;55 (Sangat
                            Kurang)
                        </option>
                        <option value="2" @if (2 == old('myselect', $dosen->c1)) selected="selected" @endif>55-65 (Kurang)
                        </option>
                        <option value="3" @if (3 == old('myselect', $dosen->c1)) selected="selected" @endif>66-75 (Cukup)
                        </option>
                        <option value="4" @if (4 == old('myselect', $dosen->c1)) selected="selected" @endif>76-90 (Baik)</option>
                        <option value="5" @if (5 == old('myselect', $dosen->c1)) selected="selected" @endif>>90 (Sangat Baik)
                        </option>
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
                        <option value="1" @if (1 == old('myselect', $dosen->c2)) selected="selected" @endif>&lt;25 (Sangat
                            Kurang)
                        </option>
                        <option value="2" @if (2 == old('myselect', $dosen->c2)) selected="selected" @endif>>25-28,9 (Kurang)
                        </option>
                        <option value="3" @if (3 == old('myselect', $dosen->c2)) selected="selected" @endif>29-33,9 (Cukup)
                        </option>
                        <option value="4" @if (4 == old('myselect', $dosen->c2)) selected="selected" @endif>34-37 (Baik)</option>
                        <option value="5" @if (5 == old('myselect', $dosen->c2)) selected="selected" @endif>>37 (Sangat Baik)
                        </option>
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
                        <option value="1" @if (1 == old('myselect', $dosen->c4)) selected="selected" @endif>0-55 (Sangat
                            Kurang)
                        </option>
                        <option value="2" @if (2 == old('myselect', $dosen->c4)) selected="selected" @endif>56-65 (Kurang
                        </option>
                        <option value="3" @if (3 == old('myselect', $dosen->c4)) selected="selected" @endif>66-75 (Cukup)
                        </option>
                        <option value="4" @if (4 == old('myselect', $dosen->c4)) selected="selected" @endif>76-90 (Baik)
                        </option>
                        <option value="5" @if (5 == old('myselect', $dosen->c4)) selected="selected" @endif>91-100 (Sangat
                            Baik)
                        </option>
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
                        <option value="1" @if (1 == old('myselect', $dosen->c4)) selected="selected" @endif>0-55 (Sangat
                            Kurang)
                        </option>
                        <option value="2" @if (2 == old('myselect', $dosen->c4)) selected="selected" @endif>56-65 (Kurang)
                        </option>
                        <option value="3" @if (3 == old('myselect', $dosen->c4)) selected="selected" @endif>66-75 (Cukup)
                        </option>
                        <option value="4" @if (4 == old('myselect', $dosen->c4)) selected="selected" @endif>76-90 (Baik)
                        </option>
                        <option value="5" @if (5 == old('myselect', $dosen->c4)) selected="selected" @endif>91-100 (Sangat
                            Baik)
                        </option>
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
                        <option value="1" @if (1 == old('myselect', $dosen->c5)) selected="selected" @endif>0 (Sangat
                            Kurang)
                        </option>
                        <option value="2" @if (2 == old('myselect', $dosen->c5)) selected="selected" @endif>1 (Kurang)
                        </option>
                        <option value="3" @if (3 == old('myselect', $dosen->c5)) selected="selected" @endif>2 (Cukup)
                        </option>
                        <option value="4" @if (4 == old('myselect', $dosen->c5)) selected="selected" @endif>3 (Baik)
                        </option>
                        <option value="5" @if (5 == old('myselect', $dosen->c5)) selected="selected" @endif>>4 (Sangat
                            Baik)
                        </option>
                    </select>
                    @error('c1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary ml-3">Simpan</button>
            </div>
        </div>
    </form>

@endsection
