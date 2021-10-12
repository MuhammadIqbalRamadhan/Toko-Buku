<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barangs;
use App\Models\Kategoris;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barangs::all()->first()->count();
        return view('admin.dashboard.index',compact('barang'));
    }
}
