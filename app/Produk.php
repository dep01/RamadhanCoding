<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $primaryKey = 'id_produk';
    protected $fillable = ['nama_produk','id_kategori','harga','qty'];
    protected $table = 'produk';
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
}
