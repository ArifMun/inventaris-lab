<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $barang = Barang::count();
        $kategori = Kategori::count();
        $pengajuan = Pengajuan::count();
        return view('home.home.home',compact('barang','kategori','pengajuan'));
    }

    public function barang(){
        // dd(request('search'));
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
                ->select('inv_barang.*','inv_kategori.nama_kategori')
                ->get();

        $kategori = Kategori::all();
        return view('home.master.barang.daftar-barang',compact('barang','kategori'));
    }

    public function kategori(){
        $kategori = Kategori::all();
        return view('home.master.kategori.kategori-barang',compact('kategori'));
    }

    public function pengadaan()
    {
        $pengajuan = Pengajuan::join('inv_barang','inv_barang.id','=','inv_pengajuan.id_barang')
                    ->select('inv_pengajuan.*','inv_barang.no_barang','inv_barang.unit')
                    ->get()
                    ->sortDesc();
        $barang = Barang::all();
        return view('home.pengadaan.pengadaan-barang',compact('pengajuan','barang'));
    }
}