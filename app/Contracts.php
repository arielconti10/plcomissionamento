<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable = [
        'value',
        'contract_type',
        'organ',
        'bank',
        'employee_id',
        'shop_id'
    ];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
