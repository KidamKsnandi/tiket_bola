@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Edit Stadion</div>
                    <div class="card-body">
                        <form action="{{ route('stadion.update', $stadion->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ $stadion->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    value="{{ $stadion->alamat }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
