@extends('layout.app')
@include('layout.navbar-user')

@section('content')
    <div class="container mt-5">
        <!-- Dummy Error Section -->
        <div class="alert alert-danger" style="display:none;">
            <ul>
                <li>Nama Member tidak boleh kosong</li>
            </ul>
        </div>

        <h3>Data Member</h3>

        <form action="#" method="POST">
            @csrf

            <div class="row mt-4">
                <!-- Kolom Produk Terpilih -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Produk Terpilih</h5>
                            <table class="table mt-4">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Produk 1</td>
                                        <td>2</td>
                                        <td>Rp 50.000</td>
                                        <td>Rp 100.000</td>
                                    </tr>
                                    <tr>
                                        <td>Produk 2</td>
                                        <td>1</td>
                                        <td>Rp 75.000</td>
                                        <td>Rp 75.000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada produk terpilih.</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total Harga</th>
                                        <th>Rp 175.000</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-end">Total Bayar</th>
                                        <th>Rp 175.000</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Kolom Data Member -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5>Informasi Member</h5>
                            <div class="mb-3">
                                <label for="nama_member" class="form-label">Nama Member</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member" value="John Doe" placeholder="Masukkan nama member">
                            </div>

                            <div class="mb-3" style="display:none;">
                                <input type="text" class="form-control" id="member_id" name="member_id" value="12345">
                            </div>

                            <div class="mb-3" style="display:none;">
                                <input type="number" name="dibayar" id="dibayar" class="form-control" value="175000">
                            </div>

                            <div class="mb-3">
                                <label for="poin" class="form-label">Poin</label>
                                <input type="number" id="poin" name="poin" class="form-control" value="500" readonly>
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="gunakan_poin" name="gunakan_poin" value="1" checked>
                                <label class="form-check-label" for="gunakan_poin">Gunakan Poin</label>
                                <small class="text-danger d-block mt-1">Poin belum dapat digunakan karena ini adalah pembelian pertama.</small>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
