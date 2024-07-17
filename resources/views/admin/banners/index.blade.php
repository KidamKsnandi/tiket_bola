@extends('layouts.admin.index')

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#banner').DataTable();
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
                        <li class="breadcrumb-item active" aria-current="page">Banner</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('banner.create') }}" class="btn btn-success float-right">Tambah Banner</a>
                </div>
                <table class="table table-striped" id="banner">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $banner->nama }}</td>
                                <td><a href="{{ $banner->gambar() }}" target="_blank"><img src="{{ $banner->gambar() }}"
                                            alt="{{ $banner->nama }}" style="width: 100px;"></a></td>
                                <td>{{ $banner->deskripsi }}</td>
                                <td>
                                    <form action="{{ route('banner.destroy', ['banner' => $banner->id]) }}" method="POST">
                                        @csrf
                                        <a href="{{ route('banner.edit', ['banner' => $banner->id]) }}"
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
