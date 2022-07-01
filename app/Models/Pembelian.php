<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'Pembelian';
    protected $fillable = [
        'quantity',
        'total_harga',
        'bukti_tf',
        'status_tf',
        'user_id',
        'product_id',

    ];
}
