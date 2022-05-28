<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    
    public function index()
    {
        // $user = User::orderBy('id','desc')->paginate(10);
        $user = User::get()->sortDesc();
        return view('admin.master.user.user',compact('user'));
    }

    public function store(Request $request)
    {

        $validasi = Validator::make(
            $request->all(),
            [
            'nama'     => 'required',
            'jabatan'  => 'required',
            'no_induk' => 'required|unique:inv_akun',
            'username' => 'required|min:3|max:255|unique:inv_akun',
            'password' => 'required|min:5|max:255',
            'level'    => 'required'
        ]);

        if($validasi->fails()){
            return back()->with('warning', 'Data Tidak Tersimpan')
            ->withErrors($validasi);
        }else{
            // $validasi['password'] = Hash::make($validasi['password']);
            $validasi->password = Hash::make($request->password);
            User::create($validasi);
            return redirect('/user')->with('success', 'Data Berhasil Disimpan');
        }

    }

    public function update(Request $request, $id)
    {

        $validasi = Validator::make(
            $request->all(),
            [
            'nama'     => 'required',
            'jabatan'  => 'required',
            'no_induk' => 'required',
            'username' => 'required|min:3|max:255',
            'password' => 'required|min:5|max:255',
            'level'    => 'required'
        ]);

        if ($validasi->fails()) {
            $input = $request->all();
            return back()->with('warning', 'Data Tidak Tersimpan')
            ->withErrors($validasi)
            ->withInput($input);
        }else{
            $validasi = User::find($id);
            $validasi->nama     = $request->nama;
            $validasi->jabatan  = $request->jabatan;
            $validasi->no_induk = $request->no_induk;
            $validasi->username = $request->username;
            $validasi->password = Hash::make($request->password);
            $validasi->level    = $request->level;
            $validasi->save();
            return redirect('/user')->with('success', 'Data Berhasil Diubah');
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
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Data Berhasil Dihapus');
    }
}