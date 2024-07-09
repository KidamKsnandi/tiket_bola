@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('jadwal-pertandingan.create') }}" class="btn btn-success float-right">Add Jadwal
                        Pertandingan</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Club 1</th>
                            <th scope="col">Club 2</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal Pertandingan</th>
                            <th scope="col">Stadion</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalPertandingan as $jadwal)
                            <tr>
                                <td>{{ $jadwal->club1->nama }}</td>
                                <td>{{ $jadwal->club2->nama }}</td>
                                <td>{{ $jadwal->keterangan }}</td>
                                <td>{{ $jadwal->tanggal_tanding }}</td>
                                <td>{{ $jadwal->stadion->nama }}</td>
                                <td>
                                    <form action="{{ route('jadwal-pertandingan.destroy', $jadwal->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this jadwal pertandingan?')">
                                        @csrf
                                        <a href="{{ route('jadwal-pertandingan.edit', $jadwal->id) }}"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
