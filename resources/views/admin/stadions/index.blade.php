@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('stadion.create') }}" class="btn btn-success float-right">Add stadion</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stadions as $stadion)
                            <tr>
                                <td>{{ $stadion->nama }}</td>
                                <td>{{ $stadion->alamat }}</td>
                                <td>
                                    <form action="{{ route('stadion.destroy', $stadion->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this stadion?')">
                                        @csrf
                                        <a href="{{ route('stadion.edit', $stadion->id) }}" class="btn btn-warning"><i
                                                class="fas fa-edit"></i></a>
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
