<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $pengguna = User::count();
        $barang = Barang::count();
        $kategori = Kategori::count();
        $pengajuan = Pengajuan::count();
        return view('admin.dashboard.dashboard',compact('pengguna','barang','kategori','pengajuan'));
    }
}