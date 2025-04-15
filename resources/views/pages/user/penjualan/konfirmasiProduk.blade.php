@include('layout.app')
@include('layout.navbar-user')

<div class="container mt-5">
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                                    @php
                                        $total = 0;
                                    @endphp

                                        @foreach ($produk_terpilih as $item)
                                            <tr>
                                                <td>{{ $item['produk']->nama_produk }}</td>
                                                <td>{{ $item['jumlah'] }}</td>
                                                <td>{{ number_format($item['produk']->harga, 0, ',', '.') }}</td>
                                                <td>{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                            </tr>
                                            <input type="hidden" name="produk_id[]" value="{{ $item['produk']->id }}">
                                            <input type="hidden" name="qty[]" value="{{ $item['jumlah'] }}">
                                            @php
                                                $total += $item['subtotal'];
                                            @endphp
                                        @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total</th>
                                        <th>{{ number_format($total_harga, 0, ',', '.') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <p class="mt-3">
                        Member tidak terdaftar atau ingin daftar member baru? <a
                            href="{{ route('user.member.create') }}">Tambah Member</a>
                    </p>
                </div>



                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Status Pelanggan:</label><br>
                        <input type="radio" name="status_pelanggan" value="non member" id="status_non_member" checked
                            onclick="togglePhoneInput()"> Non Member
                        <input type="radio" name="status_pelanggan" value="member" id="status_member"
                            onclick="togglePhoneInput()"> Member
                    </div>

                    <div class="mb-3" id="phone-input" style="display: none;">
                        <label for="no_hp">No. Telepon</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp"
                            value="{{ old('no_hp') }}">

                    </div>

                    <div class="mb-3">
                        <label for="dibayar">Total yang Dibayarkan (Rp)</label>
                        <input type="number" class="form-control" name="dibayar" id="dibayar" required>
                        <div id="rupiah-display" class="form-text fw-bold mt-1"></div>
                    </div>

                    <div class="mb-3 text-end">
                        <button type="button" class="btn btn-primary" onclick="handleSubmit()">Pesan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePhoneInput() {
        const phoneInput = document.getElementById('phone-input');
        const isMember = document.getElementById('status_member').checked;
        phoneInput.style.display = isMember ? 'block' : 'none';
    }

    window.onload = togglePhoneInput;

    function handleSubmit() {
        const statusMember = document.getElementById('status_member').checked;
        const form = document.getElementById('penjualanForm');

        if (statusMember) {
            form.action = "{{ route('user.penjualan.dataMember') }}";
        } else {
            form.action = "{{ route('user.penjualan.simpanNonMember') }}";
        }

        form.submit();
    }


    const inputDibayar = document.getElementById('dibayar');
    const rupiahDisplay = document.getElementById('rupiah-display');

    inputDibayar.addEventListener('input', function () {
        const value = parseInt(this.value.replace(/\D/g, '')) || 0;
        rupiahDisplay.textContent = value ? formatRupiah(value) : '';
    });

    function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

</script>
