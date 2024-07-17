@extends('layouts.admin.index')

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#stadion').DataTable();
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
                        <li class="breadcrumb-item active" aria-current="page">Stadion</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('stadion.create') }}" class="btn btn-success float-right">Tambah stadion</a>
                </div>
                <table class="table table-striped" id="stadion">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stadions as $stadion)
                            <tr>
                                <td>{{ $stadion->nama }}</td>
                                <td>{{ $stadion->alamat }}</td>
                                <td>
                                    <form action="{{ route('stadion.destroy', $stadion->id) }}" method="POST">
                                        @csrf
                                        <a href="{{ route('stadion.edit', $stadion->id) }}" class="btn btn-warning"><i
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
