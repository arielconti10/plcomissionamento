<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = [
        'name',
        'document',
        'e-mail',
        'shop_id'
    ];


}
