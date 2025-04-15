@include('layout.app')
@include('layout.navbar-user')

<div class="container mt-5">
    <h3>Produk yang dipilih</h3>

    <div class="container justify-content-center align-items-center">
        <form id="penjualanForm" method="POST">
            @csrf
            <div class="row" style="margin-top: 100px">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
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
                                    <!-- Static Products Data -->
                                    <tr>
                                        <td>Produk A</td>
                                        <td>2</td>
                                        <td>Rp 50,000</td>
                                        <td>Rp 100,000</td>
                                    </tr>
                                    <tr>
                                        <td>Produk B</td>
                                        <td>1</td>
                                        <td>Rp 75,000</td>
                                        <td>Rp 75,000</td>
                                    </tr>
                                    <tr>
                                        <td>Produk C</td>
                                        <td>3</td>
                                        <td>Rp 30,000</td>
                                        <td>Rp 90,000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total</th>
                                        <th>Rp 265,000</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <p class="mt-3">
                        Member tidak terdaftar atau ingin daftar member baru? <a href="{{ route('user.member.create') }}">Tambah Member</a>
                    </p>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Status Pelanggan:</label><br>
                        <input type="radio" name="status_pelanggan" value="non member" checked> Non Member
                        <input type="radio" name="status_pelanggan" value="member"> Member
                    </div>

                    <div class="mb-3">
                        <label for="no_hp">No. Telepon (Jika Member)</label>
                        <input type="text" class="form-control" name="no_hp">
                    </div>

                    <div class="mb-3">
                        <label for="dibayar">Total yang Dibayarkan (Rp)</label>
                        <input type="number" class="form-control" name="dibayar" required>
                    </div>

                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Pesan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
