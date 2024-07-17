@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('bank.index') }}">Bank</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Bank</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Bank') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bank.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row mb-2">
                                <label for="logo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file"
                                        class="form-control @error('logo') is-invalid @enderror" name="logo" required>

                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="nama_bank"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nama Bank') }}</label>

                                <div class="col-md-6">
                                    <input id="nama_bank" type="text"
                                        class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank"
                                        value="{{ old('nama_bank') }}" required autofocus>

                                    @error('nama_bank')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="atas_nama"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Atas nama') }}</label>

                                <div class="col-md-6">
                                    <input id="atas_nama" type="text"
                                        class="form-control @error('atas_nama') is-invalid @enderror" name="atas_nama"
                                        value="{{ old('atas_nama') }}" required autofocus>

                                    @error('atas_nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="no_rekening"
                                    class="col-md-4 col-form-label text-md-right">{{ __('No. Rekening') }}</label>

                                <div class="col-md-6">
                                    <input id="no_rekening" type="number"
                                        class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening"
                                        value="{{ old('no_rekening') }}" required autofocus>

                                    @error('no_rekening')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2 mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
