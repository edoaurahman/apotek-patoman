@extends('layouts.main')
@section('content')
    @include('layouts.sidenav')
    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.topnav')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Laporan Bulan Ini</h6>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                            Obat</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Terjual</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub
                                            Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{ $item->nama_obat }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    {{ $item->total_obat }}
                                                </div>
                                            </td>
                                            <td class="align-middle">Rp. {{ number_format($item->harga, 2, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($item->sub_total, 2, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <a target="_blank" href="{{ route('laporan.viewPDF') }}" class="btn btn-primary m-3">View
                                PDF</a>
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
@endsection
