<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pelanggan extends Model
{
    use HasFactory;
    protected $fillable=['nama','alamat','telepon'];

    public function transaksi():HasMany
    {
      return $this->hasMany(transaksi::class);
    }
}
