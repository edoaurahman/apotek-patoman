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
                            <h6>Daftar Obat</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Obat</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Jumlah</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Harga</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail_transaksi as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->nama_obat }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->harga }}</p>
                                                </td>
                                                
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <a class="btn btn-primary m-3" href="{{route('transaksi.faktur',$item->transaksi_id)}}">Faktur</a>
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
@endsection
