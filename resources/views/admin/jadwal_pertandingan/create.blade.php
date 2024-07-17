@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('jadwal-pertandingan.index') }}">Jadwal Pertandingan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal Pertandingan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Jadwal Pertandingan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jadwal-pertandingan.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="club1">Club 1:</label>
                                <select name="club1" id="club1"
                                    class="form-control @error('club1') is-invalid @enderror" required>
                                    <option value="">-- Pilih Club 1 --</option>
                                    @foreach ($club as $c)
                                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                                @error('club1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="club2">Club 2:</label>
                                <select name="club2" id="club2"
                                    class="form-control @error('club2') is-invalid @enderror" required>
                                    <option value="">-- Pilih Club 2 --</option>
                                    @foreach ($club as $c)
                                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                                @error('club2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="keterangan">Keterangan:</label>
                                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" required></textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="jadwal_tanding">Jadwal Tanding:</label>
                                <input type="datetime-local" name="jadwal_tanding" id="jadwal_tanding"
                                    class="form-control @error('jadwal_tanding') is-invalid @enderror" required>
                                @error('jadwal_tanding')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="stadion">Stadion:</label>
                                <select name="stadion" id="stadion"
                                    class="form-control @error('stadion') is-invalid @enderror" required>
                                    <option value="">-- Pilih Stadion --</option>
                                    @foreach ($stadion as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                                @error('stadion')
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
