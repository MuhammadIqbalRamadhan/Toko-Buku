<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoris;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategoris::paginate(5);
        return view('Admin.kategori.index' ,compact('kategori'));
    }
    
    public function create()
    {
        return view('admin.kategori.create');
    }

    public function tambah_kategori(Request $request)
    {
        $request->validate([
            '*'=>'required'
                    ]);
                    $kategori = new Kategoris();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();
        return redirect()->route('kategori_index')->with('success', 'Data berhasil Di Tambah');
    }

    public function destroy($id)
    {
        Kategoris::destroy($id);
        return redirect()->route('kategori_index')->with('success', 'Data berhasil Di Hapus');
    }

    public function edit($id){
        $kategori=Kategoris::find($id);
        return view('admin.kategori.edit',['kategori'=>$kategori]);
    }

    public function update(Request $request, $id){
        $request->validate([
            '*'=>'required'
                    ]);
      
        $kategori = Kategoris::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;
        $kategori->save();
        return redirect()->route('kategori_index')->with('success', 'Data berhasil Di Update');
        
    }
}
