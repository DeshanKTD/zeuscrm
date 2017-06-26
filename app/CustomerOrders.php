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
    public $primaryKey = 'oderno';
    protected $fillable = [
        'orderno', 'email', 'model', 'amount', 'reqdate',
    ];



}
