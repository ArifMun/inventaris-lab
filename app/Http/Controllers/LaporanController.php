<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
                ->select('inv_barang.*','inv_kategori.nama_kategori')
                ->get()
                ->sortDesc();

        $kategori = Kategori::all();
        return view('admin.laporan.laporan',compact('barang','kategori'));
    }

    public function cetak(Request $request){
        $users = User::get()->sortDesc();
        $k = $request->kategori;
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
        ->select('inv_barang.*','inv_kategori.nama_kategori')
        ->where('kategori', $k)
        ->get();
        $kategori = Kategori::all();
        
        $pdf = FacadePdf::loadView('admin.laporan.cetak-laporan', compact('users','barang','kategori'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream();
    }
}