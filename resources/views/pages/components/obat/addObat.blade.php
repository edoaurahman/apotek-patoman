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
                            <h6>Masukkan Data Obat</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2 m-3">
                            <form role="form" method="post" action="{{ route('obat.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Kode Obat</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Kode"
                                        name="kode" aria-label="kode">
                                </div>
                                <div class="mb-3">
                                    <label for="">Nama Obat</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Nama Obat"
                                        name="nama_obat" aria-label="nama 0bat">
                                </div>
                                <div class="form-group">
                                    <label for="">Pilih Supplier</label>
                                    <select class="form-control" name="supplier_id" id="exampleFormControlSelect1">
                                        <option value="">Pilih Supplier...</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Produsen</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Produsen"
                                        name="produsen" aria-label="supplier">
                                </div>
                                <div class="mb-3">
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control form-control-lg" placeholder="Stok"
                                        name="stok" aria-label="supplier">
                                </div>
                                <div class="mb-3">
                                    <label for="">Harga</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Harga"
                                        name="harga" aria-label="supplier">
                                </div>
                                <div class="mb-3">
                                    <label for="">Tanggal Kadaluarsa</label>
                                    <input type="date" class="form-control form-control-lg" placeholder="Tanggal Kadaluarsa"
                                        name="tgl_kadaluarsa" aria-label="Tanggal Kadaluarsa">
                                </div>
                                <div class="mb-3">
                                    <label for="">Masukkan Gambar</label>
                                    <input type="file" class="form-control form-control-lg" placeholder="Gambar"
                                        name="gambar_obat" aria-label="supplier">
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection
