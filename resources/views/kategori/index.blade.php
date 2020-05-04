@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Kategori</h1>
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
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kategori</h3>
                    </div>
                    <form action="{{route('KategoriStore')}}" method="POST" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name">
                                <div class="invalid-feedback">
                                    Masukan nama kategori.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Kategori</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($kategori as $row)
                                    <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $row->nama_kategori}}</td>
                                    <td>{{ $row->created_at}}</td>
                                    <td>
                                    <form action="{{route('KategoriDelete',$row->id_kategori)}}" method="post">
                                        @csrf
                                        @method('DELETE')   
                                        <button class="badge badge-danger" type="submit">Hapus</button>
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
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.modal -->
@endsection