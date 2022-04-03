<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    // public function index()
    // {
    //     return view('index');
    // }
    
    // public function cek_login(Request $request)
    // {
    //     $username = $request->input('username');
    //     $password = $request->input('password');
        
    //     if (Auth::attempt(['username' => $username,'password' => $password])) {
    //         return redirect()->intended('/home')->with('success','login berhasil');
    //     }else{
    //         return redirect()->intended('/')->with('error','username dan password salah');
    //     }
    // }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/');
    // }
    public function index()
    {
        // if ($user = Auth::user()) {
        //     if ($user->level == 'admin') {
        //         return redirect()->intended('admin');
        //     } elseif ($user->level == 'superadmin') {
        //         return redirect()->intended('superadmin');
        //     }
        // }
        return view('index');
    }
    
    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);
            DB::table('inv_akun')->update([
                'ip_login' => $request->ip() 
            ]);
        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == 'admin') {
                    return redirect()->intended('admin')->with('success','Anda Berhasil Login');
                } elseif ($user->level == 'superadmin') {
                    return redirect()->intended('superadmin')->with('success','Anda Berhasil Login');
                }
                return redirect()->intended('/');
                
                
            }

        return redirect('login')->with('warning','Username/password salah');
                                // ->withInput()
                                // ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect('login');
    }
}