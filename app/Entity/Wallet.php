<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';
    public $timestamps = false;

    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\Entity\User');
    }

    public function currency()
    {
        return $this->belongsToMany('App\Entity\Currency', 'money')->using('App\Entity\Money')
            ->withPivot('amount', 'deleted')->as('money');
    }
}
