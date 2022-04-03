<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.id')
                ->select('inv_barang.*','inv_kategori.nama_kategori')
                ->get();

        $kategori = Kategori::all();
        return view('admin.master.barang.barang',compact('barang','kategori'));
    }

    public function store(Request $request)
    {
        Barang::create([
            'kategori'    => $request->kategori,
            'no_barang'   => $request->no_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'penulis'     => $request->penulis,
            'keterangan'  => $request->keterangan,
            
        ]);

        return redirect('/barang')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->kategori = $request->kategori;
        $barang->no_barang = $request->no_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jumlah = $request->jumlah;
        $barang->penulis = $request->penulis;
        $barang->keterangan = $request->keterangan;
        $barang->save();

        return redirect('/barang')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('success', 'Data Berhasil Dihapus');
    }
}