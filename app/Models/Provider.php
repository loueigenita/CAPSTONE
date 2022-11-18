<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Provider extends Model
{


    protected $fillable = [
        'name', 'description', 'email', 'phone', 'paymentinfo'
    ];

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt');
    }
}
