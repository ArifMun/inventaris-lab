<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
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
        // $k = $request->kategori;
        // $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
        // ->select('inv_barang.*','inv_kategori.nama_kategori')
        // ->where('kategori', $k)
        // ->get()
        // ->sortDesc();
        // $kategori = Kategori::all();
        
        // $pdf = FacadePdf::loadView('admin.laporan.cetak-laporan', compact('barang','kategori'));
        // $pdf->setPaper('A4','potrait');
        // return $pdf->download('laporan.pdf');
        $k = $request->kategori;
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
        ->select('inv_barang.*','inv_kategori.nama_kategori')
        ->where('kategori', $k)
        ->get();

        $kategori = Kategori::all();
        
        return view('admin.laporan.cetak-laporan',compact('barang','kategori'));
    }
}