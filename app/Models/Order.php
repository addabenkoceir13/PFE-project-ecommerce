<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoices;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id',
        'id_user',
        'id_order',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'country',
        'state',
        'pincode',
        'status',
        'image',
        'message',
        'tracking_no',

    ];

    public function orderitm()
    {
        return $this->belongsTo(Invoices::class, 'id_order', 'id');
    }

    public function ordersitems()
    {
        return $this->hasMany(Invoices::class,'id_order','id');
    }

    public function ordersuseritem()
    {
        return $this->belongsTo(User::class, 'id_user','id');
    }
}
