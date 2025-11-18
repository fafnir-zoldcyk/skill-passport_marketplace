<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $guarded = [];
    public function produk(){
        return $this->belongsTo(Produk::class,'id_produk');
    }
}
