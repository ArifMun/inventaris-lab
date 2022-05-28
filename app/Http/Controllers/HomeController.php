<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $barangrusak = Barang::where('keterangan','rusak')->count();
        $barangbaik  = Barang::where('keterangan','baik')->count();
        $barang      = Barang::count();
        $kategori    = Kategori::count();
        $pengajuan   = Pengajuan::count();
        return view('home.home.home',['title' => 'Beranda'],compact('barang','kategori','pengajuan','barangbaik','barangrusak'));
    }

    public function barang(){
        // dd(request('search'));
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
                ->select('inv_barang.*','inv_kategori.nama_kategori')
                ->get();

        $kategori = Kategori::all();
        return view('home.master.barang.daftar-barang',['title' => 'Data Barang'],compact('barang','kategori'));
    }

    public function cetakBarang(Request $request){
        $k = $request->kategori;
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
                        ->select('inv_barang.*','inv_kategori.nama_kategori')
                        ->where('kategori', $k)
                        ->get();
        $kategori = Kategori::all();
        
        $pdf = FacadePdf::loadView('home.laporan.cetak-laporan', compact('barang','kategori'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream();
        
    }

    public function kategori(){
        $kategori = Kategori::all();
        return view('home.master.kategori.kategori-barang',['title' => 'Data Kategori'],compact('kategori'));
    }

    public function pengadaan()
    {
        $pengajuan = Pengajuan::join('inv_barang','inv_barang.id','=','inv_pengajuan.id_barang')
                                ->select('inv_pengajuan.*','inv_barang.no_barang','inv_barang.unit')
                                ->get()
                                ->sortDesc();
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
                ->select('inv_barang.*','inv_kategori.nama_kategori')
                ->get();
        return view('home.pengadaan.pengadaan-barang',['title' => 'Data Pengadaan'],compact('pengajuan','barang'));
    }
}