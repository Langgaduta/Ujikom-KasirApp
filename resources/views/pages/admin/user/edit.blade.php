@include('layout.app')
@include('layout.navbar-admin')

<div class="container">
    <div class="row mt-5">
        <h3>Edit User</h3>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST">
                        <!-- @csrf -->
                        <!-- @method('PUT') -->

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="Nama User">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="user@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="admin" selected>admin</option>
                                <option value="employee">employee</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah)</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="#" class="btn btn-secondary mt-3">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
