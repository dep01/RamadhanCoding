@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Ubah Produk</h1>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            {{ $message }}
        </div>
        @endif
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Produk</h3>
                    </div>
                <form action="{{ route('ProdukUpdate',$produk->id_produk)}}" method="POST" role="form">
                    @csrf
                    @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" value="{{$produk->nama_produk}}"
                                    class="form-control {{ $errors->has('nama_produk') ? 'is-invalid':'' }}"
                                    id="nama_produk">
                                <div class="invalid-feedback">
                                    Masukan nama kategori.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" class="form-control">
                                   @forelse ($kategori as $row)
                                        <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                                   @empty
                                     
                                   @endforelse
                                </select>
                            </div>
                            <div class="form group">
                                <label for="harga_produk">Harga Produk</label>
                                <input type="numeric" name="harga_produk" value="{{$produk->harga}}"
                                    class="form-control {{ $errors->has('harga_produk') ? 'is-invalid':'' }}"
                                    id="harga_produk">
                                <div class="invalid-feedback">
                                    Masukan harga produk.
                                </div>
                            </div>
                            <div class="form group">
                                <label for="qty">Qty</label>
                                <input type="numeric" name="qty" value="{{$produk->qty}}"
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