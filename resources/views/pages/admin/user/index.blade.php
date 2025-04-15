@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h3>User</h3>
            <div class="row mt-5">
                <div class="col-md-12 text-end">
                    <a href="#" class="btn btn-primary">Tambah User +</a>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>Admin Satu</td>
                            <td>admin@example.com</td>
                            <td>admin</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <form action="#" method="POST" class="d-inline">
                                    <!-- @csrf -->
                                    <!-- @method('DELETE') -->
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>User Dua</td>
                            <td>user@example.com</td>
                            <td>user</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <form action="#" method="POST" class="d-inline">
                                    <!-- @csrf -->
                                    <!-- @method('DELETE') -->
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
