<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'id_cate',
        'id_supp',
        'name_prod',
        'mark_prod',
        'original_price',
        'selling_price',
        'qte_stock',
        'status',
        'storages',
        'colors',
        'image',
        'description',
        'small_descripton',
    ];


    public function category()
    {
        return $this->belongsTo(category::class, 'id_cate', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'id_supp', 'id');
    }

    public function fournisseur()
    {
        return $this->belongsTo(Suppliers::class, 'id_supp', 'id');
    }

    public function notationr()
    {
        return $this->hasMany(Notation::class, 'id', 'id_prod');
    }
}


