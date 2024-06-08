<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detiltransaksi extends Model
{
    protected $fillable=['transaksi_id','produk_id','qty','harga'];
    use HasFactory;

    public function transaksi():BelongsTo
    {
        return $this->belongsTo(transaksi::class);
    }

    public function produk():BelongsTo
    {
        return $this->belongsTo(produk::class);
    }
    
}
