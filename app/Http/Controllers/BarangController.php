<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        $barang = Barang::join('inv_kategori','inv_kategori.id','=','inv_barang.kategori')
                ->select('inv_barang.*','inv_kategori.nama_kategori')
                ->get()
                ->sortDesc();

        $kategori = Kategori::all();
        return view('admin.master.barang.barang',compact('barang','kategori'));
    }

    public function autofill($id){
        // $data = DB::table('inv_kategori')->where('id',$id)->get();
        $data = Kategori::find($id);
        return response()->json($data);
    }
    
    public function store(Request $request)
    {
        $kode = DB::table('inv_barang')->max('id');
        $kode1='';
        $kode = str_replace($request->kode_kategori, "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;
        if (strlen($kode) == 1) {
    		    $kode1 = "000";
            } elseif (strlen($kode) == 2) {
                $kode1 = "00";
            } elseif (strlen($kode) == 3) {
                $kode1 = "0";
            }

    	$kodeBaru = $request->kode_kategori.$kode1.$incrementKode;
        $barang=Barang::create([
            'kategori'    => $request->kategori,
            'no_barang'   => $kodeBaru,
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'unit'        => $request->unit,
            'penulis'     => $request->penulis,
            'keterangan'  => $request->keterangan,
            
        ]);
        return redirect('/barang')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->kategori    = $request->kategori;
        $barang->no_barang   = $request->no_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->jumlah      = $request->jumlah;
        $barang->unit        = $request->unit;
        $barang->penulis     = $request->penulis;
        $barang->keterangan  = $request->keterangan;
        $barang->update();

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