@extends('layouts.app')
@section('title', 'Edit Bobot')
@section('content-title', 'Edit Bobot')
@section('content-subtitle', '-')
@section('content')
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('bobot.update', $bobot->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Kriteria:</strong>
                    <input type="text" name="" value="{{ $bobot->kriteria }}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Bobot: tersedia bobot {{ $max }} %</strong>
                    <input type="number" min="0" max="{{ $max }}" name="bobot" value="{{ $bobot->bobot }}"
                        class="form-control">
                    @error('bobot')
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
