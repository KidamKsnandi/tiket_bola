@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('banner.create') }}" class="btn btn-success float-right">Add Banner</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $banner->nama }}</td>
                                <td><a href="{{ $banner->gambar() }}" target="_blank"><img src="{{ $banner->gambar() }}"
                                            alt="{{ $banner->nama }}" style="width: 100px;"></a></td>
                                <td>
                                    <form action="{{ route('banner.destroy', ['banner' => $banner->id]) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                        @csrf
                                        <a href="{{ route('banner.edit', ['banner' => $banner->id]) }}"
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
