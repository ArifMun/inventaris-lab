<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Models\Barang;
use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class LapPengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::join('inv_barang','inv_barang.id','=','inv_pengajuan.id_barang')
                    ->select('inv_pengajuan.*','inv_barang.no_barang','inv_barang.unit')
                    ->get()
                    ->sortDesc();
        $barang = Barang::all();
        return view('admin.laporan.laporan-pengajuan',compact('pengajuan','barang'));
    }

    
    public function cetak(Request $request)
    {
        $users = User::all();
        $p = $request->verifikasi;
        $pengajuan = Pengajuan::join('inv_barang','inv_barang.id','=','inv_pengajuan.id_barang')
                    ->select('inv_pengajuan.*','inv_barang.no_barang','inv_barang.unit')
                    ->where('verifikasi',$p)
                    ->get();
                    
        $barang = Barang::all();
        // return view('admin.laporan.cetak-laporan-pengajuan',compact('pengajuan','barang'));
        $pdf = FacadePdf::loadView('admin.laporan.cetak-laporan-pengajuan',compact('users','pengajuan','barang'));
        $pdf->setPaper('A4','potrait');
        return $pdf->stream();
    }

}