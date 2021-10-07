@extends('admin.template.layout')
@section('title')
Detail Buku
@endsection

@section('content')
@include('sweetalert::alert')
<div class="container-fluid">
@foreach ($barang as $item)
<div class="card card-secondary">

    <div class="card-header">

        <h4>Nama : {{$item->nama_barang}}</h4>

    </div>
    <div class="card-body">
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img style="width: 350px" src="{{ asset('/foto/'.$item->gambar_buku) }}" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <table >
                            <tr>
                                <td colspan="2">Nama Buku </td>
                                <td colspan="6">: {{$item->nama_barang}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">Kode Barang </td>
                                <td colspan="6">: {{$item->kode_barang}}</td>
                                
                            </tr>

                            <tr>
                                <td colspan="2">Kategori </td>
                                <td colspan="6">: {{$item->kategori->nama_kategori}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">pengarang </td>
                                <td colspan="6">: {{$item->pengarang}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">Penerbit </td>
                                <td colspan="6">: {{$item->penerbit}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">tahun </td>
                                <td colspan="6">: {{$item->tahun}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">Isbn </td>
                                <td colspan="6">: {{$item->isbn}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">Harga Beli </td>
                                <td colspan="6">: RP. {{number_format($item->harga_beli)}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">Harga Jual </td>
                                <td colspan="6">: RP. {{number_format($item->harga_jual)}}</td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">stock </td>
                                <td colspan="6">: {{number_format($item->stock)}}</td>
                                
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@endsection
