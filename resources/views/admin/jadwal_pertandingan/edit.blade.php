@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Edit Jadwal Pertandingan</div>
                    <div class="card-body">
                        <form action="{{ route('jadwal-pertandingan.update', $jadwalPertandingan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="club1">Club 1:</label>
                                <select name="club1" id="club1" class="form-control">
                                    @foreach ($club as $c)
                                        <option value="{{ $c->id }}"
                                            @if ($c->id == $jadwalPertandingan->id_club_1) selected @endif>{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="club2">Club 2:</label>
                                <select name="club2" id="club2" class="form-control">
                                    @foreach ($club as $c)
                                        <option value="{{ $c->id }}"
                                            @if ($c->id == $jadwalPertandingan->id_club_2) selected @endif>{{ $c->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control"
                                    value="{{ $jadwalPertandingan->keterangan }}">
                            </div>
                            <div class="form-group">
                                <label for="jadwal_tanding">Jadwal Tanding:</label>
                                <input type="datetime-local" name="jadwal_tanding" id="jadwal_tanding" class="form-control"
                                    value="{{ date('Y-m-d\TH:i', strtotime($jadwalPertandingan->tanggal_tanding)) }}">
                            </div>
                            <div class="form-group">
                                <label for="stadion">Stadion:</label>
                                <select name="stadion" id="stadion" class="form-control">
                                    @foreach ($stadion as $s)
                                        <option value="{{ $s->id }}"
                                            @if ($s->id == $jadwalPertandingan->id_stadion) selected @endif>{{ $s->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
