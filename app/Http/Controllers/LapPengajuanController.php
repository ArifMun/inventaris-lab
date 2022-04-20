<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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

    
    public function cetak()
    {
        $pengajuan = Pengajuan::join('inv_barang','inv_barang.id','=','inv_pengajuan.id_barang')
                    ->select('inv_pengajuan.*','inv_barang.no_barang','inv_barang.unit')
                    ->get()
                    ->sortDesc();
        $barang = Barang::all();
        return view('admin.laporan.cetak-laporan-pengajuan',compact('pengajuan','barang'));
    }

}