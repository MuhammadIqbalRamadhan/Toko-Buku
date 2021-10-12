<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    public $table = 'suppliers';
    protected $fillable = ['nama_supplier','alamat','no_tlp'];
}
