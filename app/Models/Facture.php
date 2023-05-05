<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table = 'facture_';
    protected $fillable = [
        'id',
        'id_order',
        'id_prod',
        'qte_prod',
        'total_prix',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'id_prod', 'id');
    }
}
