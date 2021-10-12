<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\Kategoris;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        // dd(request('search'));
        // if(request('search')){
        //     $barang->where('nama_barang','like','%'. request('search') .'%');
        // }
        // $barang = Barangs::paginate(5);
        // return view('Admin.barang.index',compact('barang'));
        $pagination=5;
        $barang = Barangs::when($request->keyword , function($query) use($request){
            $query->where('nama_barang','like',"%{$request->keyword}%");
        })->orderBy('created_at','desc')->paginate($pagination);
        
        return view('Admin.barang.index',compact('barang'));
        
    }
    
    public function create()
    {
        $tanggals = Carbon::now()->format('y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek= Barangs::count();
        if ($cek == 0) {
            $urut = 10000001;
            $nomor= 'B'. $thnBulan . $urut;
            // dd($nomor);
        }else{
            $ambil = Barangs::all()->last();
            $urut =(int)substr($ambil->id,-8)+1;
            $nomor= 'B'. $thnBulan . $urut;
        }
        $kategori = Kategoris::all();
        return view('admin.barang.create',compact('nomor','kategori'));
    }

    public function tambah_buku(Request $request)
    {
        $request->validate([
            '*'=>'required'
                    ]);
                    // dd($request->all());
                    
        $gambar_buku = $request->file('gambar_buku');

        $nama_foto = time() . "_" . $gambar_buku->getClientOriginalName();
            
        // isi dengan nama folder tempat kemana file diupload
        $moved = 'foto';
        $gambar_buku->move($moved, $nama_foto);

        $barang = new Barangs();
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_id = $request->kategori_id;
        $barang->gambar_buku = $nama_foto;
        $barang->pengarang = $request->pengarang;
        $barang->penerbit = $request->penerbit;
        $barang->tahun = $request->tahun;
        $barang->isbn = $request->isbn;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->stock = $request->stock;
        $barang->save();
        return redirect()->route('barang_index')->with('success', 'Data berhasil Di Tambah');
    }

    public function destroy(Request $request)
    {
        $barang = Barangs::findOrFail($request->id);
        unlink("foto/" . $barang->gambar_buku);
        Barangs::where("id", $barang->id)->delete();
        return redirect()->route('barang_index')->with('success', 'Data berhasil Di Hapus');
    }

    public function detail_barang($id)
    {
        $barang=Barangs::where('id',$id)->get();
        $kategori=Kategoris::all();
        return view('admin.barang.detail',['kategori'=>$kategori],compact('barang'));
    }

    public function edit($id){
        $barang=Barangs::find($id);
        $kategori = Kategoris::all();
        return view('admin.barang.edit',['barang'=>$barang],compact('kategori'));
    }

    public function update(Request $request, $id){
        $request->validate(['*'=>'required']);     
        
        // dd($request->all());
       
         $barang = Barangs::find($id);
        if($request->has('gambar_buku')){
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_id = $request->kategori_id;
        $barang->pengarang = $request->pengarang;
        $barang->penerbit = $request->penerbit;
        $barang->tahun = $request->tahun;
        $barang->isbn = $request->isbn;
        if(isset($barang->gambar_buku)){
        unlink("foto/" . $barang->gambar_buku);
        $file = $request->file('gambar_buku');
		$gambar_buku_path = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'foto';
		$file->move($tujuan_upload,$gambar_buku);
        $barang->gambar_buku=$gambar_buku_path;
        }else{
        $file = $request->file('gambar_buku');
		$gambar_buku_path = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'foto';
		$file->move($tujuan_upload,$gambar_buku);
        }
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->gambar_buku=$gambar_buku_path;
        $barang->stock = $request->stock;
        $barang->save();
        }else{
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_id = $request->kategori_id;
        $barang->pengarang = $request->pengarang;
        $barang->penerbit = $request->penerbit;
        $barang->tahun = $request->tahun;
        $barang->isbn = $request->isbn;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->stock = $request->stock;
        $barang->save();
        }
        return redirect()->route('barang_index')->with('success', 'Data berhasil Di Update');
        
    }
}
