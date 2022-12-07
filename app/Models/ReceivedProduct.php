<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceivedProduct extends Model
{
    protected $fillable = [
        'product_id', 'stock', 'stock_defective'
    ];


    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
