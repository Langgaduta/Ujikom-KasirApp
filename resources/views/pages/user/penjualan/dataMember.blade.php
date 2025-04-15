@extends('layout.app')
@include('layout.navbar-user')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Data Member</h3>

        <form action="{{ route('user.penjualan.simpanMember') }}" method="POST">
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
                                    @php
                                        $total_harga = $total_harga ?? 0;
                                    @endphp

                                    @if (!empty($produk_terpilih))
                                        @foreach ($produk_terpilih as $item)
                                            <input type="hidden" name="produk_id[]" value="{{ $item['produk']->id }}">
                                            <input type="hidden" name="qty[]" value="{{ $item['jumlah'] }}">
                                            <tr>
                                                <td>{{ $item['produk']->nama_produk }}</td>
                                                <td>{{ $item['jumlah'] }}</td>
                                                <td>{{ number_format($item['produk']->harga, 0, ',', '.') }}</td>
                                                <td>{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada produk terpilih.</td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total Harga</th>
                                        <th>{{ number_format($total_harga, 0, ',', '.') }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-end">Total Bayar</th>

                                        <th>{{ number_format($dibayar, 0, ',', '.') }}</th>

                                        {{-- <th>{{ number_format($uang_dibayarkan, 0, ',', '.') }}</th> --}}
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
                            <!-- Dropdown Pilih Member -->
                            <div class="mb-3">
                                <label for="nama_member" class="form-label">Nama Member</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member"
                                    value="{{ old('nama_member', $nama_member ?? '') }}"
                                    placeholder="Masukkan nama member">
                            </div>


                            <div class="mb-3">
                                {{-- <label for="member_id" class="form-label">Member ID</label> --}}
                                <input type="text" class="form-control" id="member_id" name="member_id"
                                    value="{{ $member_id ?? '' }}" style="display: none">
                            </div>

                            <div class="mb-3">
                                <input type="number" name="dibayar" id="dibayar" class="form-control"
                                    value="{{ $dibayar ?? 0 }}" style="display: none">
                            </div>

                            <!-- Input Poin -->
                            <div class="mb-3">
                                <label for="poin" class="form-label">Poin</label>
                                <input type="number" id="poin" name="poin" class="form-control"
                                    value="{{ $poin ?? 0 }}" readonly>
                            </div>

                            <!-- Checkbox Gunakan Poin -->
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="gunakan_poin" name="gunakan_poin"
                                    value="1" {{ $poin_disabled ? 'disabled' : '' }}
                                    {{ old('gunakan_poin', false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="gunakan_poin">Gunakan Poin</label>
                                @if ($poin_disabled)
                                    <small class="text-danger d-block mt-1">Poin belum dapat digunakan karena ini adalah
                                        pembelian pertama.</small>
                                @endif
                            </div>



                            <!-- Tombol Selanjutnya -->
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
