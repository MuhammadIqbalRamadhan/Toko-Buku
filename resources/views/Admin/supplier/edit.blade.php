@extends('admin.template.layout')
@section('title')
Form Tambah Supplier
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
            <form action="/update_supplier/{{$supplier->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label  class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier"  placeholder="Masukan Nama Supplier" value="{{$supplier->nama_supplier}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" >{{$supplier->alamat}}</textarea>
                </div>
                <div class="mb-3">
                    <label  class="form-label">No Telepon</label>
                    <input type="number" class="form-control" name="no_tlp"  placeholder="Masukan No Telepon" value="{{$supplier->no_tlp}}">
                </div>
               
                <div>
                    <button class="btn btn-primary btn-block">Simpan</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection