<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\petugas;
use App\level;
use DB;
use App\pegawai;

class LoginController extends Controller
{
    function login(request $request)
    {
    	$cek = petugas::where([
    		'username'=>$request->username,
    		'password'=>$request->password,	
    	])->get();

    	if ($cek->count() > 0) {
    		$level = level::where('id_level', $cek[0]->id_level)->first();

    		if ($level->nama_level == 'Administrator') {
    			session::put('admin', $cek[0]);
    			return redirect('dashboardAdmin');
    		}elseif ($level->nama_level == 'operator') {
    			session::put('operator', $cek[0]);
    			return redirect('dashboardOperator');
    		}else{
    			echo "Level Tidak Ada!";
    		}
    	}else{
    		session::flash('error', 'username dan password salah');
    		return redirect('login');
    	}
    }

    function logout()
    {
    	session::flush();
    	return redirect('login');
    }
    
    function loginPegawai(request $request)
    {
        $cek = pegawai::where([
            'username'=>$request->username,
            'password'=>$request->password,
        ])->get();

        if ($cek->count() > 0) {
            session::put('pegawai', $cek[0]);
            return redirect('dashboardPegawai');
        }else{
            session::flash('error','Username dan Password salah');
        }
    }

    function logoutPegawai()
    {
        session::flush();
        return redirect('loginPegawai');
    }
}
