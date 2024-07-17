@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('stadion.index') }}">Stadion</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Stadion</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Stadion</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('stadion.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    @error('nama') is-invalid @enderror" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" id="alamat" class="form-control" @error('alamat') is-invalid @enderror" required></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
