@extends('layouts.app')
@section('title', 'Tambah Bobot')
@section('content-title', 'Tambah Bobot')
@section('content-subtitle', '-')
@section('content')
    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('bobot.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bobot:</strong>
                    <input type="text" name="bobot" class="form-control" placeholder="Bobot">
                    @error('nama')
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
