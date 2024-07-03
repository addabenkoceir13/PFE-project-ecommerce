<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'notations';
    protected $fillable = [
        'id',
        'id_user',
        'id_prod',
        'stars_rated',

    ];

    public function rating()
    {
        return $this->belongsTo(products::class, 'id_prod', 'id');
    }

    public function productr()
    {
        return $this->belongsTo(Products::class, 'id_prod', 'id');
    }
}
