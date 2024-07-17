@extends('layouts.admin.index')

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#club').DataTable();
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
                        <li class="breadcrumb-item active" aria-current="page">Club</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('club.create') }}" class="btn btn-success float-right">Tambah Club</a>
                </div>
                <table class="table table-striped" id="club">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clubs as $club)
                            <tr>
                                <td>{{ $club->nama }}</td>
                                <td><a href="{{ $club->logo() }}" target="_blank"><img src="{{ $club->logo() }}"
                                            alt="{{ $club->nama }}" style="width: 100px;"></a></td>
                                <td>
                                    <form action="{{ route('club.destroy', ['club' => $club->id]) }}" method="POST">
                                        @csrf
                                        <a href="{{ route('club.show', ['club' => $club->id]) }}" class="btn btn-primary"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{ route('club.edit', ['club' => $club->id]) }}" class="btn btn-warning"><i
                                                class="fas fa-edit"></i></a>
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
