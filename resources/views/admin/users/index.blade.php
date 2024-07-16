@extends('layouts.admin.index')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">List Pengguna Aplikasi Tiket Bola</h1>
        <a href="{{ route('pengguna.create') }}" class="btn btn-primary">Tambah User</a>
        <table id="user-table" class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role_id == 1 ? 'Admin' : 'User' }}</td>
                        <td>
                            <a href="{{ route('pengguna.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#user-table').DataTable();
        });
    </script>
@endsection
