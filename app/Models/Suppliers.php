<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Suppliers extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'suppliers';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'image',
        'address',
        'description',
        'let',
        'lng',
        'location',
        'rating',
    ];

    public function ratings()
    {
        return $this->belongsTo(Rating::class, 'id', 'id_supp');
    }
}
