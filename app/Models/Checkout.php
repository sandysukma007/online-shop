<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'nama_produk',
        'foto_produk',
        'harga_produk',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    
}
