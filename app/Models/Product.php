<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
   
    protected $fillable = [
        'name', 'description', 'product_category_id', 'price', 'stock', 'stock_defective'
    ];
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id');
    }

    public function receiveds()
    {
        return $this->hasMany('App\Models\ReceivedProduct');
    }
}
