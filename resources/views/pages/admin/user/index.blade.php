@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>User</h3>
            <div class="row mt-5">
                <div class="col-md-12 text-end">
                    <a href="{{ url('/admin/user/create') }}" class="btn btn-primary">Tambah User +</a>
                </div>
                <table class="table table-striped mt-5 text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>

                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ url('/admin/user/' . $user->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
