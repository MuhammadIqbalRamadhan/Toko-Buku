<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $pagination=5;
        $supplier = Supplier::when($request->keyword , function($query) use($request){
            $query->where('nama_supplier','like',"%{$request->keyword}%");
        })->orderBy('created_at','desc')->paginate($pagination);
        return view('Admin.supplier.index',compact('supplier'));
    }

    public function create()
    {
        return view('Admin.supplier.create');
    }

    public function tambah_supplier(Request $request)
    {
        $request->validate([
            '*'=>'required'
                    ]);
        
        $supplier = new Supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->no_tlp = $request->no_tlp;
        $supplier->save();
        return redirect()->route('supplier_index')->with('success', 'Data berhasil Di Tambah');

    }

    public function destroy(Request $request,$id)
    {
      
        Supplier::destroy($id);
        return redirect()->route('supplier_index')->with('success', 'Data berhasil Di Hapus');
    }

    public function edit($id){

        $supplier=Supplier::find($id);
        return view('admin.supplier.edit',['supplier'=>$supplier]);
    }
    public function update(Request $request, $id){
        $request->validate([
            '*'=>'required'
                    ]);
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->no_tlp = $request->no_tlp;
        $supplier->save();
        return redirect()->route('supplier_index')->with('success', 'Data berhasil Di Update');
        
    }
}
