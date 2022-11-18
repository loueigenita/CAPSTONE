<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Invoice extends Model
{
    protected $fillable = [


        'invoice_no',
        // 'customer_id',
        'invoice_date',
        'client',
        'client_address',
        'due_date',
        'product_name',
        'product_qty',
        'product_price',
        'total',
        'status'

    ];


    public function products()
    {
      return $this->hasMany(Product::class);
    }
    public function setTotalAttribute()
    {
        $this->attributes['total'] = $this->product_qty * $this->product_price;
    }

    public function getTotalAttribute($value)
    {
        return $value;
    }
}
