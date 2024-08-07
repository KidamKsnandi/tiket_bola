@extends('layouts.admin.index')

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tiket').DataTable();
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
                        <li class="breadcrumb-item"><a href="{{ route('jadwal-pertandingan.index') }}">Jadwal Pertandingan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tiket</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('tiket.create', $id_jadwal) }}" class="btn btn-success float-right">Tambah Tiket</a>
                </div>
                <table class="table table-striped" id="tiket">
                    <thead>
                        <tr>
                            <th scope="col">Jadwal Pertandingan</th>
                            <th scope="col">Nama Tiket</th>
                            <th scope="col">Tribun</th>
                            <th scope="col">Kuota</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tiket as $tiket)
                            <tr>
                                <td>{{ $tiket->jadwal_pertandingan->club1->nama }} VS
                                    {{ $tiket->jadwal_pertandingan->club2->nama }}</td>
                                <td>{{ $tiket->nama_tiket }}</td>
                                <td>{{ $tiket->tribun }}</td>
                                <td>{{ $tiket->kuota }}</td>
                                <td>Rp.{{ number_format($tiket->harga, 0, '', '.') }}</td>
                                <td>
                                    <form
                                        action="{{ route('tiket.destroy', ['id_jadwal' => $id_jadwal, 'id' => $tiket->id]) }}"
                                        method="POST">
                                        @csrf
                                        <a href="{{ route('tiket.edit', ['id_jadwal' => $id_jadwal, 'id' => $tiket->id]) }}"
                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
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
