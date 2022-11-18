<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PaymentMethod extends Model
{

    protected $fillable = ['name', 'description'];
    public function transactions() {
        return $this->hasMany('App\Models\Transaction', 'payment_method_id', 'id');
    }
}
