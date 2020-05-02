@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Tambah Produk</h1>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Produk</h3>
                    </div>
                    <form action="#" method="POST" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk"
                                    class="form-control {{ $errors->has('nama_produk') ? 'is-invalid':'' }}"
                                    id="nama_produk">
                                <div class="invalid-feedback">
                                    Masukan nama kategori.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                   
                                </select>
                            </div>
                            <div class="form group">
                                <label for="harga_produk">Harga Produk</label>
                                <input type="numeric" name="harga_produk"
                                    class="form-control {{ $errors->has('harga_produk') ? 'is-invalid':'' }}"
                                    id="harga_produk">
                                <div class="invalid-feedback">
                                    Masukan harga produk.
                                </div>
                            </div>
                            <div class="form group">
                                <label for="qty">Qty</label>
                                <input type="numeric" name="qty"
                                    class="form-control {{ $errors->has('qty') ? 'is-invalid':'' }}" id="qty">
                                <div class="invalid-feedback">
                                    Masukan quantity.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.modal -->
@endsection