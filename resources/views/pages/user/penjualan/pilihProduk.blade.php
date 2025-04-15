@include('layout.app')
@include('layout.navbar-user')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h2 class="">Penjualan</h2>
        </div>
    </div>
    <form action="{{ route('user.penjualan.konfirmasiProduk') }}" method="GET">
        @csrf
        <div class="row mt-4">
            @foreach ($produks as $index => $produk)
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow">
                        <img src="{{ asset('storage/' . $produk->foto_produk) }}" class="card-img-top img-fluid"
                            alt="Foto Produk" style="height: 250px; object-fit: cover; border-bottom: 1px solid #ddd;">

                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="card-title fw-bold">{{ $produk->nama_produk }}</h6>
                                <p class="card-text mb-1 text-muted">Stok:
                                    <strong>{{ $produk->stok }}</strong>
                                </p>
                                <p class="card-text mb-2">Harga:
                                    <span class=" fw-semibold">Rp
                                        {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                </p>
                            </div>

                            @if ($produk->stok == 0)
                                <p class="text-danger fw-bold mt-auto">Stok kosong</p>
                            @else
                                <div class="mt-auto">
                                    <div class="input-group input-group-sm mb-2">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="kurangQty('{{ $produk->id }}')">−</button>
                                        <input type="hidden" name="produk_id[]" value="{{ $produk->id }}">
                                        <input type="number" name="qty[]" id="qty-{{ $produk->id }}"
                                            class="form-control text-center qty-input" style="max-width: 60px;"
                                            value="0" min="0" data-id="{{ $produk->id }}"
                                            data-harga="{{ $produk->harga }}" data-stok="{{ $produk->stok }}">


                                        <button type="button" class="btn btn-outline-primary"
                                            onclick="tambahQty('{{ $produk->id }}')">+</button>
                                    </div>
                                    <p class="mb-0">Subtotal:
                                        <strong class="text-dark">Rp
                                            <span id="subtotal-{{ $produk->id }}">0</span>
                                        </strong>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-center mt-5">
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
            </div>
        </div>
    </form>
</div>

<script>
    function tambahQty(id) {
        const input = document.getElementById('qty-' + id);
        const stok = parseInt(input.getAttribute('data-stok'));
        const currentQty = parseInt(input.value || 0);

        if (currentQty < stok) {
            input.value = currentQty + 1;
            hitungSubtotal(id);
        } else {
            alert('Stok tidak mencukupi untuk produk ini.');
        }
    }


    function kurangQty(id) {
        const input = document.getElementById('qty-' + id);
        if (parseInt(input.value) > 0) {
            input.value = parseInt(input.value || 0) - 1;
            hitungSubtotal(id);
        }
    }

    function hitungSubtotal(id) {
        const input = document.getElementById('qty-' + id);
        const harga = parseInt(input.dataset.harga);
        const qty = parseInt(input.value || 0);
        const subtotal = harga * qty;
        const formatted = new Intl.NumberFormat('id-ID').format(subtotal);
        document.getElementById('subtotal-' + id).innerText = formatted;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const qtyInputs = document.querySelectorAll('.qty-input');
        qtyInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                hitungSubtotal(this.dataset.id);
            });
        });
    });
</script>
