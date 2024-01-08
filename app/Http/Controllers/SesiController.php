<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        $data=[
            'title'=>'Login Page',
        ];
        return view('login',$data);
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        $infoLogin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/barang');
            }elseif(Auth::user()->role == 'kasir'){
                return redirect('/transaksi');
            }
        }else{
            return redirect('')->withErrors('Email atau Password Salah!')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
