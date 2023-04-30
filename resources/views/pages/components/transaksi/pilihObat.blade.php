@extends('layouts.main')
@section('content')
    @include('layouts.sidenav')
    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.topnav')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between">
                            <h6>Pilih Obat</h6>
                            <input type="text" class="form-control w-25" placeholder="Search Obat" id="myInput"
                                onkeyup="searching()">
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="myTable" style="cursor: default;">
                                    <thead>
                                        <tr>
                                            <th onclick="sortTable(0)"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Obat</th>
                                            <th onclick="sortTableNumerical(1)"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Stok</th>
                                            <th onclick="sortTableNumerical(2)"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Harga</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Foto</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah Obat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($obats as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->nama_obat }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item->stok }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item->harga }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    @if ($item->foto)
                                                        <span type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal" data-bs-title="Paracetamol"
                                                            data-bs-image="{{ asset('assets') }}/img/obat/{{ $item->foto }}"
                                                            class="text-secondary text-xs font-weight-bold">
                                                            <img width="80px"
                                                                src="{{ asset('assets') }}/img/obat/{{ $item->foto }}">
                                                        </span>
                                                    @else
                                                        <i class="ni ni-album-2"></i>
                                                    @endif
                                                </td>
                                                <form id="form" action="{{ route('transaksi.tambahObat') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input hidden type="text" name="keranjang_id"
                                                        value="{{ $keranjang_id }}">
                                                    <input hidden type="text" name="kode_obat"
                                                        value="{{ $item->kode }}">
                                                    <td class="align-middle">
                                                        <input type="number" value="1" min="1"
                                                            class="form-control form-control-sm"
                                                            placeholder="Masukkan Jumlah" id="jumlahObat" name="jumlah_obat"
                                                            aria-label="jumlah obat">
                                                    </td>
                                                    <td class="align-middle">
                                                        <button type="submit" {{ $item->stok == 0 ? 'disabled' : '' }}
                                                            class="btn my-auto btn-warning btn-xs">Tambahkan</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>List</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Obat</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Harga</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail_keranjang as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item['obat']->nama_obat }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item->jumlah }}</span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item['obat']->harga }}</span>
                                                </td>

                                                <form action="{{ route('transaksi.hapusObat') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input hidden type="text" name="keranjang_id"
                                                        value="{{ $keranjang_id }}">
                                                    <input hidden type="text" name="kode_obat"
                                                        value="{{ $item->kode_obat }}">
                                                    <input hidden type="text" name="jumlah_obat"
                                                        value="{{ $item->jumlah }}">
                                                    <td class="align-middle">
                                                        <button type="submit"
                                                            class="btn my-auto btn-danger btn-xs">Hapus</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <br>
                                <form action="{{ route('transaksi.bayar') }}" method="post">
                                    @csrf
                                    <span class="m-3">Total Bayar : {{ $total_pembayaran }}</span>
                                    <input hidden type="number" value="{{ $keranjang_id }}" name="keranjang_id">
                                    <div class="m-3">
                                        <label for="Date">Tanggal Transaksi</label>
                                        <input type="datetime-local" class="form-control form-control-lg"
                                            placeholder="Tanggal" name="tgl" aria-label="Tanggal" id="Date">
                                    </div>
                                    <div class="m-3">
                                        <label for="jumlah_bayar">Jumlah Pembayaran</label>
                                        <input type="number" class="form-control form-control-lg"
                                            placeholder="Jumlah Pembayaran" name="jumlah_bayar"
                                            aria-label="Jumlah Pembayaran" id="jumlah_bayar">
                                    </div>
                                    <div class="m-3">
                                        <label for="change">Kembalian</label>
                                        <input type="number" class="form-control form-control-lg"
                                            placeholder="Kembalian" name="change" aria-label="Kembalian" id="change"
                                            readonly>
                                    </div>
                                    <div class="m-3 col-lg-3">
                                        <button disabled id="checkoutButton" class="btn btn-primary btn-sm mb-0 w-100"
                                            type="submit">Check out</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Obat</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <img src="" alt="" width="450px" id="modalImg"
                                        class="img-responsive mx-auto d-block">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
    </main>
    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const img = document.getElementById("modalImg");
            const image = button.getAttribute('data-bs-image')
            img.setAttribute("src", image);

            const title = button.getAttribute('data-bs-title')
            const modalTitle = exampleModal.querySelector('.modal-title')
            modalTitle.textContent = title

        })
        var now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('Date').value = now.toISOString().slice(0, 16);

        const jumlahObat = document.getElementById('jumlahObat');
        const form = document.getElementById('form');

        form.addEventListener('submit', function(e) {
            if (jumlahObat.value.trim() === '' || jumlahObat.value.trim() === '0') {
                alert('Jumlah obat tidak boleh kosong!');
                e.preventDefault();
            }
        });
    </script>
    <script src="{{ asset('assets') }}/js/script.js"></script>
    <script>
        const paymentAmountInput = document.querySelector("#jumlah_bayar");
        const changeInput = document.querySelector("#change");
        const checkoutButton = document.querySelector("#checkoutButton");

        paymentAmountInput.addEventListener("input", () => {
            const totalPembayaran = {{ $total_pembayaran }};
            const paymentAmount = parseInt(paymentAmountInput.value);
            const change = Number.isNaN(paymentAmount - totalPembayaran) ? -1 : paymentAmount - totalPembayaran;

            changeInput.value = change;
            console.log(change);

            if (Number(change) < 0) {
                checkoutButton.disabled = true;
                changeInput.value = null;
            } else {
                checkoutButton.disabled = false;
            }

        });
    </script>
@endsection
