<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $table = 'fournisseurs';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'fax',
        'address',
        'description',
    ];
}
