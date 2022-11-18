<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{


    protected $fillable = [
        'name', 'email', 'phone', 'document_id'
    ];

    public function sales()
    {
        return $this->hasMany('App\Models\Sale');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
