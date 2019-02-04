<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = [
        'name',
        'document',
        'email',
        'shop_id'
    ];

    public function shop() {
        return $this->belongsTo('App\Shop');
    }

    public function contracts(){
        return $this->hasMany('App\Contracts');
    }

//    public function comissionValueAttribute($value){
//        foreach($this->contracts as $contract) {
//
//        }
//    }
}
