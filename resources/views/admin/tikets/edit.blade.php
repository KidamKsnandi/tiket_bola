@extends('layouts.admin.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Tiket - <b> {{ $jadwal->club1->nama }} VS {{ $jadwal->club2->nama }}
                            </b>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tiket.update', ['id_jadwal' => $id_jadwal, 'id' => $tiket->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_tiket">Nama Tiket:</label>
                                <input type="text" value="{{ $tiket->nama_tiket }}" name="nama_tiket" id="nama_tiket"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tribun">Tribun:</label>
                                <select name="tribun" id="tribun" class="form-control" required>
                                    <option value="">-- Pilih Tribun --</option>
                                    <option value="Tribun Utara" {{ $tiket->tribun == 'Tribun Utara' ? 'selected' : '' }}>
                                        Tribun Utara</option>
                                    <option value="Tribun Selatan"
                                        {{ $tiket->tribun == 'Tribun Selatan' ? 'selected' : '' }}>Tribun Selatan</option>
                                    <option value="Tribun Timur" {{ $tiket->tribun == 'Tribun Timur' ? 'selected' : '' }}>
                                        Tribun Timur</option>
                                    <option value="Tribun Barat" {{ $tiket->tribun == 'Tribun Barat' ? 'selected' : '' }}>
                                        Tribun Barat</option>
                                    <option value="VIP" {{ $tiket->tribun == 'VIP' ? 'selected' : '' }}>VIP</option>
                                    <option value="VVIP" {{ $tiket->tribun == 'VVIP' ? 'selected' : '' }}>VVIP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kuota">Kuota:</label>
                                <input type="number" value="{{ $tiket->kuota }}" name="kuota" id="kuota"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="number" value="{{ $tiket->harga }}" name="harga" id="harga"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
