<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $fillable = [
        'id',
        'id_order',
        'id_prod',
        'qty_prod',
        'total_price',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'id_prod', 'id');
    }
}
