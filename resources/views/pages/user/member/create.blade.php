@include('layout.app')
@include('layout.navbar-user')

<div class="container">
    <div class="row mt-5">
        <h3>Tambah Member</h3>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <!-- Formulir yang berisi data statis (dummy) -->
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="John Doe" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp" value="08123456789" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                            <input type="date" class="form-control" name="tanggal_bergabung" id="tanggal_bergabung" value="2025-04-15" disabled>
                        </div>
                        <!-- Tombol hanya untuk navigasi tanpa mengirimkan data -->
                        <button type="button" class="btn btn-primary mt-3">Tambah</button>
                        <a href="{{ route('user.member.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
