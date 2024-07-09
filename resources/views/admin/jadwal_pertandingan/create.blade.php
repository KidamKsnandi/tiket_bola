@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create Jadwal Pertandingan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jadwal-pertandingan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="club1">Club 1:</label>
                                <select name="club1" id="club1" class="form-control" required>
                                    <option value="">-- Pilih Club 1 --</option>
                                    @foreach ($club as $c)
                                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="club2">Club 2:</label>
                                <select name="club2" id="club2" class="form-control" required>
                                    <option value="">-- Pilih Club 2 --</option>
                                    @foreach ($club as $c)
                                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jadwal_tanding">Jadwal Tanding:</label>
                                <input type="datetime-local" name="jadwal_tanding" id="jadwal_tanding" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="stadion">Stadion:</label>
                                <select name="stadion" id="stadion" class="form-control" required>
                                    <option value="">-- Pilih Stadion --</option>
                                    @foreach ($stadion as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
