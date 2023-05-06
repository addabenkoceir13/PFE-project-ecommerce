<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_part extends Model
{
    use HasFactory;

    protected $table = 'products_parts';
    protected $fillable = [
        'id',
        'id_prod',
        'colors',
        'storage',
        'qty_stock',
    ];
}
