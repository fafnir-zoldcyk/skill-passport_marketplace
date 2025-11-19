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
    public function admin(){
        $data['user'] = User::all();
        $data['totaluser'] = User::count();
        $data['totaltoko'] = Toko::count();
        $data['totalproduk'] = Produk::count();
        $data['totalkate'] = Kategori::count();
        $data['totalstock'] = Produk::where('stock','>',0)->count();
        return view('admin.admin',$data);
    }
    public function member(){
        $data['user'] = User::all();
        $data['totaluser'] = User::count();
        $data['totaltoko'] = Toko::count();
        $data['totalproduk'] = Produk::count();
        $data['totalkate'] = Kategori::count();
        $data['totalstock'] = Produk::where('stock','>',0)->count();
        return view('member.member',$data);
    }
    public function beranda(){
        $data['kategori'] = Kategori::all();
        $data['produk'] = Produk::all();
        return view('beranda',$data);
    }
    public function regis(){
        return view('register');
    }
    public function index(){
        $data['user'] = User::all();
        return view('admin.user',$data);
    }
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
                return redirect()->route('member')->with('success','Selamat Datang Member');
            }
        }
        return back()->with('error','Username atau Password salah');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Berhasil');
    }

}
