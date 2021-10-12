@extends('admin.template.layout')
@section('title')
Daftar Supplier
@endsection

@section('content')
@include('sweetalert::alert')

<div class="container-fluid">
    <a href="{{route('supplier_create')}}" class="btn btn-icon icon-left btn-success mb-3 mr-2">
        <i class="fas fa-plus"></i> Supplier </a>

        <div class=" d-flex justify-content-end mb-2">
            <form action="{{url()->current()}}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control " placeholder="Search for..." name="keyword" value="{{request('keyword')}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>

                            <th>Edit</th>
                            <th>Hapus</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>

                    </tfoot>

                    <tbody>
                        @foreach ($supplier as $item)

                        <tr>
                            <td>{{$item->nama_supplier}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->no_tlp}}</td>
                            
                            

                            <td>

                                <a href="/edit_supplier/{{$item->id}}" class="btn btn-warning "> <i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="/hapus_supplier/{{$item->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>

                </table>
                {{ $supplier->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
