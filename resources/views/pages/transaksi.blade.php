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
                            <h6>Selesai</h6>
                            <input type="text" class="form-control w-25" placeholder="Cari Berdasarkan tanngal" id="myInput"
                                onkeyup="searching()">
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th onclick="sortTable(0)"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Tanggal dan Waktu</th>
                                            <th onclick="sortTableNumerical(1)"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Total Pembayaran</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $item)
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->tgl }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item->total_pembayaran }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('transaksi.detail', $item->id) }}"
                                                        class="btn my-auto badge-sm btn-primary btn-xs"
                                                        data-toggle="tooltip" data-original-title="Detail Transaksi">
                                                        Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="m-3 col-lg-3">
                                    <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ route('transaksi.create') }}"
                                        type="button">Buat Transaksi Baru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Belum di Bayar</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Tanggal</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Total Pembayaran</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjang as $item)
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->tgl }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $item->total_pembayaran }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('transaksi.pilihObat', $item->id) }}"
                                                        class="btn my-auto badge-sm btn-primary btn-xs"
                                                        data-toggle="tooltip" data-original-title="Detail Transaksi">
                                                        Lanjutkan
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('transaksi.batal', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs my-auto"
                                                            onclick="return confirm('Anda yakin ingin membatalkan transaksi ini?')">Batalkan</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gambar Obat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    </script>
    <script src="{{asset('assets')}}/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

