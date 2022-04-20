<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        $pengajuan = Pengajuan::join('inv_barang','inv_barang.id','=','inv_pengajuan.id_barang')
                    ->select('inv_pengajuan.*','inv_barang.no_barang','inv_barang.unit')
                    ->get()
                    ->sortDesc();
        $barang = Barang::all();
        return view('admin.pengajuan.pengajuan',compact('pengajuan','barang'));

        // $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
        //         ->select('inv_barang.*','inv_kategori.nama_kategori')
        //         ->get()
        //         ->sortDesc();

        // $kategori = Kategori::all();
        // return view('admin.master.barang.barang',compact('barang','kategori'));

    }

    public function autofill($id){
        // $data = DB::table('inv_kategori')->where('id',$id)->get();
        $data = Barang::find($id);
        return response()->json($data);
    }

    public function store(Request $request){
        $pengajuan=Pengajuan::create([
            'id_barang'        => $request->no_barang,
            'no_barang'        => $request->no_barang,
            'nama_barang'      => $request->nama_barang,
            'jumlah_pengajuan' => $request->jumlah_pengajuan,
            'unit'             => $request->unit,
            'pengajuan'        => $request->pengajuan,
            'verifikasi'       => $request->verifikasi,
            'keterangan'       => $request->keterangan,
        ]);

        return redirect('/pengajuan')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->id_barang        = $request->id_barang;
        $pengajuan->nama_barang      = $request->nama_barang;
        $pengajuan->jumlah_pengajuan = $request->jumlah_pengajuan;
        // $pengajuan->unit             = $request->unit;
        $pengajuan->pengajuan        = $request->pengajuan;
        $pengajuan->verifikasi       = $request->verifikasi;
        $pengajuan->keterangan       = $request->keterangan;
        $pengajuan->update();

        return redirect('/pengajuan')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->delete();
        return redirect('/pengajuan')->with('success', 'Data Berhasil Dihapus');
    }
}