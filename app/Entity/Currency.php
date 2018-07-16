<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $timestamps = false;
    protected $table = 'currency';

//    protected $fillable = ['name'];
    public function wallet()
    {
        return $this->belongsToMany(Wallet::class, 'money')->using(Money::class)
            ->withPivot('amount', 'deleted')->as('money');
    }

}
