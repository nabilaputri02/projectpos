<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable=['invoice','pelanggan_id','user_id','total'];

    public function detiltransaksi():HasMany
    {
        return $this->hasMany(detiltransaksi::class);
    }
    public function planggan():BelongsTo
    {
        return $this->belongsTo(pelanggan::class);
    }

}
