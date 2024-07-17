@extends('layouts.admin.index')

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#bank').DataTable();
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
                        <li class="breadcrumb-item active" aria-current="page">Bank</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('bank.create') }}" class="btn btn-success float-right">Tambah Bank</a>
                </div>
                <table class="table table-striped" id="bank">
                    <thead>
                        <tr>
                            <th scope="col">Logo</th>
                            <th scope="col">Nama Bank</th>
                            <th scope="col">Atas Nama</th>
                            <th scope="col">No. Rekening</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $bank)
                            <tr>
                                <td><a href="{{ $bank->logo() }}" target="_blank"><img src="{{ $bank->logo() }}"
                                            alt="{{ $bank->nama }}" style="width: 100px;"></a></td>
                                <td>{{ $bank->nama_bank }}</td>
                                <td>{{ $bank->atas_nama }}</td>
                                <td>{{ $bank->no_rekening }}</td>
                                <td>
                                    <form action="{{ route('bank.destroy', ['bank' => $bank->id]) }}" method="POST">
                                        @csrf

                                        <a href="{{ route('bank.edit', ['bank' => $bank->id]) }}"
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
