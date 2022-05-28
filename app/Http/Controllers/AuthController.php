<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function index()
    {
        return view('login.login');
    }
    
    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);
        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == 'admin' ) {
                    $ip = DB::table('inv_akun')
                        ->update([
                        'ip_login' => $request->getClientIp()
                    ]);
                    // if($user->id == 1){
                    //     $ip;
                    // }else if($user->id == 2)
                    return redirect()->intended('/')->with('success','Anda Berhasil Masuk');
                    
                } else if ($user->level == 'superadmin') {
                    DB::table('inv_akun')
                        ->update([
                        'ip_login' => $request->getClientIp()
                    ]);
                    return redirect()->intended('/')->with('success','Anda Berhasil Masuk');
                }
                return redirect()->intended('/');
            }

        return redirect('login')->withInput()
                                ->with('warning','Username/password salah');
                                // ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerateToken();
        return Redirect('login');
    }
}