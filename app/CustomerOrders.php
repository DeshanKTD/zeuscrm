<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderno', 'email', 'model', 'amount', 'reqdate',
    ];



}
