<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
    public function produk(){
        return $this->hasMany(Produk::class,'id_toko');
    }
}
