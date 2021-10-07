@extends('admin.template.layout')
@section('title')
Form Edit Buku
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
            <form action="/update_barang/{{$barang->id}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama barang" value="{{$barang->nama_barang}}">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang"
                                placeholder="Masukan Nama kode barang" value="{{$barang->kode_barang}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <div class="form-group">
                                <div class="form-text" >Kategori Buku</div>
                                <select class="form-control" name="kategori_id" required>
                                    <option disabled value="">Pilih Kategori Buku</option>
                                    @foreach ($kategori as $items)
                                    <option value="{{$items->id}}" {{$items->id== $barang->kategori_id ? 'selected' : ''}}>{{$items->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Buku</label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="formFile" name="gambar_buku">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang"
                                placeholder="Masukan Nama pengarang"  value="{{$barang->pengarang}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit"
                                placeholder="Masukan Nama penerbit"  value="{{$barang->penerbit}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Tahun Buku</label>
                            <input type="number" class="form-control" name="tahun"
                                placeholder="Masukan Tahun Diterbitkannya Buku"  value="{{$barang->tahun}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="isbn"
                                placeholder="Masukan ISBN Buku"  value="{{$barang->isbn}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" name="harga_jual"
                                placeholder="Masukan Harga Jual Buku"  value="{{$barang->harga_jual}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Harga Beli</label>
                            <input type="text" class="form-control" name="harga_beli"
                                placeholder="Masukan Harga Beli Buku"  value="{{$barang->harga_beli}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control" name="stock" placeholder="Masukan Stock barang"  value="{{$barang->stock}}">
                        </div>
                    </div>
                </div>


                <div>
                    <button class="btn btn-primary btn-block">Simpan</button>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
