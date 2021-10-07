@extends('admin.template.layout')
@section('title')
Form Edit Kategori Buku
@endsection
@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/update_kategori/{{$kategori->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label  class="form-label">Nama Kategori Buku</label>
                    <input type="text" class="form-control" name="nama_kategori"  placeholder="Masukan Nama Kategori" value="{{$kategori->nama_kategori}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3" >{{$kategori->deskripsi}}</textarea>
                </div>
               
                <div>
                    <button class="btn btn-primary btn-block">Simpan</button>
                </div>
              
                
            </form>
        </div>
    </div>
</div>
@endsection
