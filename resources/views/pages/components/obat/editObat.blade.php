@extends('layouts.main')
@section('content')
    @include('layouts.sidenav')
    <main class="main-content position-relative border-radius-lg ">
        @include('layouts.topnav')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex pr-5 justify-content-between">
                            <h6>Masukkan Data Obat</h6>
                            <form action="{{ route('obat.delete', $obat->kode) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn my-auto btn-danger"
                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                    <i class="ni ni-basket"></i>
                                    Hapus</button>
                            </form>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2 m-3">
                            <form role="form" method="post" action="{{ route('obat.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Kode Obat</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Kode"
                                        name="kode" value="{{ $obat->kode }}" aria-label="kode">
                                </div>
                                <div class="mb-3">
                                    <label for="">Nama Obat</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Nama Obat"
                                        name="nama_obat" value="{{ $obat->nama_obat }}" aria-label="nama 0bat">
                                </div>
                                <div class="form-group">
                                    <label for="">Pilih Supplier</label>
                                    <select class="form-control" name="supplier_id" id="exampleFormControlSelect1">
                                        <option value="">Pilih Supplier...</option>
                                        @foreach ($suppliers as $supplier)
                                            <option {{ $supplier->id == $obat->supplier_id ? 'selected' : '' }}
                                                value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Produsen</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Produsen"
                                        name="produsen" value="{{ $obat->produsen }}" aria-label="produsen">
                                </div>
                                <div class="mb-3">
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control form-control-lg" placeholder="Stok"
                                        name="stok" value="{{ $obat->stok }}" aria-label="stok">
                                </div>
                                <div class="mb-3">
                                    <label for="">Harga</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Harga"
                                        name="harga" value="{{ $obat->harga }}" aria-label="harga">
                                </div>
                                <div class="mb-3">
                                    <label for="">Tanggal Kadaluarsa</label>
                                    <input type="date" class="form-control form-control-lg"
                                        placeholder="Tanggal kadaluarsa" name="tgl_kadaluarsa"
                                        value="{{ $obat->tgl_kadaluarsa }}" aria-label="tanggal kadaluarsa">
                                </div>
                                <div class="mb-3">
                                    <label for="">Masukkan Gambar</label>
                                    <input type="file" class="form-control form-control-lg" placeholder="Gambar"
                                        name="gambar_obat" value="{{ $obat->foto }}" aria-label="supplier">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
