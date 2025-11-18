<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];
    public function produk(){
        return $this->hasMany(Produk::class,'id_kategori');
    }
}
