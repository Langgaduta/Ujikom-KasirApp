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
                    <form action="{{ route('user.member.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp" value="{{ request('no_hp', session('no_hp')) }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                            <input type="date" class="form-control" name="tanggal_bergabung" id="tanggal_bergabung">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                        <a href="{{ route('user.member.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
