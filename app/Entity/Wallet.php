<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;

    protected $table = 'wallet';
    public $timestamps = false;

    protected $fillable = ['user_id'];

    const DELETED_AT = 'deleted';
    protected $dates = ['deleted'];

    public function user()
    {
        return $this->belongsTo('App\Entity\User');
    }

    public function currency()
    {
        return $this->belongsToMany('App\Entity\Currency', 'money')->using('App\Entity\Money')
            ->withPivot('amount')->as('money');
    }
}
