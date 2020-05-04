@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Data Produk</h1>
@endsection
@section('content')
<section class="content">
    @if ($message = Session::get('success'))
    <div class="alert alert-primary" role="alert">
        {{ $message }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
            <a href="{{ route('Tambah') }}" class="btn btn-dark">Tambah</a>
            </h3>
            {{-- <div class="float-right mr-3">
                <button type="button" class="btn btn-circle btn-sm btn-info" data-toggle="modal"
                    data-target="#exampleModal"><i class="ti-plus"></i></button><span
                    class="ml-2 font-normal text-dark">Tambah Mobil</span>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $row)
                    <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $row->nama_produk}}</td>
                    <td>{{ $row->kategori->nama_kategori}}</td>
                    <td>{{ $row->harga}}</td>
                    <td>{{ $row->qty}}</td>
                    <td>
                        
                    <form action="{{route('ProdukDelete',$row->id_produk)}}" method="post">
                        @csrf
                        @method('DELETE')   
                    <a href="{{route('ProdukEdit',$row->id_produk)}}" class="badge badge-dark">Update</a>
                        <button class="badge badge-secondary" type="submit">Hapus</button>
                    </form>
                    </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            Tidak Ada Data
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@endsection