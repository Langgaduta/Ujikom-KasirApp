@include('layout.app')
@include('layout.navbar-user')

<div class="container">
    <div class="row">
        <div class="mt-5">
            <h2 class="">Penjualan</h2>
        </div>
    </div>
    <form action="" method="">
        @csrf
        <div class="row mt-4">
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow">
                        <img src="" class="card-img-top img-fluid"
                            alt="Foto Produk" style="height: 250px; object-fit: cover; border-bottom: 1px solid #ddd;">

                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h6 class="card-title fw-bold"></h6>
                                <p class="card-text mb-1 text-muted">Stok:
                                    <strong></strong>
                                </p>
                                <p class="card-text mb-2">Harga:
                                    <span class=" fw-semibold">Rp
                                        </span>
                                </p>
                            </div>


                                <p class="text-danger fw-bold mt-auto">Stok kosong</p>

                                <div class="mt-auto">
                                    <div class="input-group input-group-sm mb-2">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="">−</button>
                                        <input type="hidden" name="produk_id[]" value="">
                                        <input type="number" name="qty[]" id="qty-"
                                            class="form-control text-center qty-input" style="max-width: 60px;"
                                            value="0" min="0" data-id=""
                                            data-harga="" data-stok="">


                                        <button type="button" class="btn btn-outline-primary"
                                            onclick="">+</button>
                                    </div>
                                    <p class="mb-0">Subtotal:
                                        <strong class="text-dark">Rp
                                            <span id="subtotal-">0</span>
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

</script>
