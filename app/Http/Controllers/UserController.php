<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Tampilan Beranda
    public function beranda(){
        $data['kategori'] = Kategori::all();
        $data['produk'] = Produk::all();
        return view('clients.beranda',$data);
    }
    //Tampilkan User
    public function index(){
        $data['user'] = User::all();
        return view('admin.user',$data);
    }
    //Tambah User
    public function store(Request $request){
        $request->validate([
            'nama'=>'required',
            'kontak' => 'required|numeric',
            'username'=>'required',
            'password'=>'required|min:3',
        ]);
        User::create([
            'nama'=>$request->nama,
            'kontak' => $request->kontak,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'role'=> 'Member',
        ]);
        return redirect()->route('user')->with('success','User Berhasil Ditambahkan');
    }
    //Edit User
    public function update(Request $request, $id){
        $request->validate([
            'nama'=>'required',
            'kontak' => 'required|numeric',
            'username'=>'required',
            'password'=>'required|min:3',
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'nama'=>$request->nama,
            'kontak' => $request->kontak,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'role'=> $user->role,
        ]);
        return redirect()->route('user')->with('success','User Berhasil Diupdate');
    }
    public function delete(String $id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','User Berhasil Dihapus');
    }

    //Login dan Logout
    public function login(){
        return view('login');
    }
    public function auth(Request $request){
        $user = $request->validate([
            'username' => 'required',
            'password' => 'required|min:3'
        ]);
        if (Auth::attempt($user)) {
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('user')->with('success','Selamat Datang Admin');
            }
            if (Auth::user()->role == 'Member') {
                return redirect()->route('beranda')->with('success','Selamat Datang Member');
            }
        }
        return back()->with('error','Username atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Berhasil');
    }

    //Tampilan Register
    public function regis(){
        return view('register');
    }
    public function register(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'kontak' => 'required|string|max:15',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string',
        ]);
        User::create([
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'role' => 'Member',
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with('success','Registrasi berhasil,silahkan login');
    }
}
