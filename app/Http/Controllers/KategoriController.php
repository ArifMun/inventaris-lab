<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.master.kategori.kategori',compact('kategori'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make(
            $request->all(),
            [
            'nama_kategori'     => 'required|unique:inv_kategori',
            'kode_kategori'     => 'required|unique:inv_kategori'
        ]);

        if($validasi->fails()){
            return back()->with('warning', 'Data Tidak Tersimpan');
        }else{
            Kategori::create($validasi);
            return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');
        }

    }

    public function update(Request $request, $id)
    {
        $validasi = Validator::make(
            $request->all(),
            [
            'nama_kategori'     => 'required|unique:inv_kategori',
            'kode_kategori'     => 'required|unique:inv_kategori'
        ]);

        if($validasi->fails()){
            return back()->with('warning', 'Data Tidak Tersimpan');
        }else{
            $kategori = Kategori::find($id);
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->kode_kategori = $request->kode_kategori;
            $kategori->save();
            return redirect('/kategori')->with('success', 'Data Berhasil Diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori')->with('success', 'Data Berhasil Dihapus');
    }
}