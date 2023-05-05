<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commande';
    protected $fillable = [
        'id',
        'id_prod',
        'id_user',
        'qte_prod',
        'name_prod',
        'total_montant',
        'created_at',
    ];

    public function products()
    {
        return $this->belongsTo(Products::class, 'id_prod', 'id');
    }
}
