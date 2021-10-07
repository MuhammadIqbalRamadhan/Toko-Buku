<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;
    public $table = 'barangs';
    protected $fillable = ['kode_barang','nama_barang','gambar_buku','kategori_id','pengarang','penerbit','tahun','isbn','harga_beli','harga_jual','stock'];

    public function kategori(){
        return $this->belongsTo(Kategoris::class,'kategori_id');
    }

}
