@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Banner') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('banner.update', ['banner' => $banner->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nama"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old('nama', $banner->nama) }}" required autofocus>

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gambar"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Gambar') }}</label>

                                <div class="col-md-6">
                                    <input id="gambar" type="file"
                                        class="form-control @error('gambar') is-invalid @enderror" name="gambar" required>

                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="mt-2">
                                        <img src="{{ $banner->gambar() }}" alt="{{ $banner->nama }}" style="width: 50px;">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                                <div class="col-md-6">
                                    <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required
                                        autofocus>{{ old('deskripsi', $banner->deskripsi) }}</textarea>

                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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