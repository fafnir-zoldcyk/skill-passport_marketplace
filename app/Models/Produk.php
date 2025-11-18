<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = [];
    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
    public function toko(){
        return $this->belongsTo(Toko::class,'id_toko');
    }
    public function gambar(){
        return $this->hasMany(Gambar::class,'id_produk');
    }
}
