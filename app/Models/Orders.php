<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'id',
        'id_prod',
        'id_user',
        'qty_prod',
        'total_price',
        'created_at',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'id_prod', 'id');
    }
}
