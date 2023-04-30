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
                            <h6>Daftar Obat</h6>
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
                                            <th onclick="sortTable(1)"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Produsen</th>
                                            <th onclick="sortTableNumerical(2)"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Stok</th>
                                            <th onclick="sortTableNumerical(3)"
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Harga</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Foto</th>
                                            <th class="text-secondary opacity-7"></th>
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
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->produsen }}</p>
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
                                                <td class="align-middle">
                                                    <a href="{{ route('obat.edit', $item->kode) }}"
                                                        class="btn my-auto btn-primary btn-xs" data-toggle="tooltip"
                                                        data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('obat.delete', $item->kode) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn my-auto btn-danger btn-xs"
                                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="m-3 col-lg-3">
                                    <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ route('obat.create') }}"
                                        type="button">Tambah Obat</a>
                                </div>
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

    {{-- Sorting Table --}}
    <script src="{{asset('assets')}}/js/script.js"></script>
@endsection
