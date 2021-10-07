@extends('admin.template.layout')
@section('title')
Kategori Buku
@endsection

@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <a href="{{route('kategori_create')}}" class="btn btn-icon icon-left btn-success mb-3 mr-2">
        <i class="fas fa-plus"></i> Kategori Buku </a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Deskripsi Singkat</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                           
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Deskripsi Singkat</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                        
                    </tfoot>
                    
                    <tbody>
                        @foreach ($kategori as $item)
                            
                        <tr>
                            <td>{{$item->nama_kategori}}</td>
                            <td>{{$item->deskripsi}}</td>
                            <td> 
                                
                                <a href="/edit_kategori/{{$item->id}}" class="btn btn-warning "> <i class="fas fa-edit"></i></a>
                            </td>
                            <td><form action="/hapus_kategori/{{$item->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                            </form></td>
                            
                        </tr>
                        
                        @endforeach
                    </tbody>
                   
                </table>
               {{ $kategori->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
