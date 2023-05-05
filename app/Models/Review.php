<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'id',
        'id_user',
        'id_prod',
        'user_review',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'id_user', 'id');
    }
    // public function ratings()
    // {
    //     return $this->belongsTo(Notation::class, 'id_user','id_user');
    // }
    public function products()
    {
        return $this->belongsTo(Products::class , 'id_prod', 'id');
    }
}
