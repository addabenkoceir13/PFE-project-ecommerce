<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ratings';
    protected $fillable = [
        'id',
        'id_admin',
        'id_supp',
        'rating',
    ];


}
