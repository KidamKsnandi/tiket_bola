@extends('layouts.admin.index')

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#jadwal_pertandingan').DataTable();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jadwal Pertandingan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('jadwal-pertandingan.create') }}" class="btn btn-success float-right">Tambah Jadwal
                        Pertandingan</a>
                </div>
                <table class="table table-striped" id="jadwal_pertandingan">
                    <thead>
                        <tr>
                            <th scope="col">Club 1</th>
                            <th scope="col">Club 2</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal Pertandingan</th>
                            <th scope="col">Stadion</th>
                            <th scope="col">Aksi</th>
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
                                    <form action="{{ route('jadwal-pertandingan.destroy', $jadwal->id) }}" method="POST">
                                        @csrf
                                        <a href="{{ route('jadwal-pertandingan.edit', $jadwal->id) }}"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                        <a href="{{ route('tiket.index', $jadwal->id) }}" class="btn btn-info"
                                            data-toggle="tooltip" title="Tiket"><i class="fa fa-credit-card"></i></a>

                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-confirm"><i
                                                class="fas fa-trash"></i></button>
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
