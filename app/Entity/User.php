<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    protected $table = 'user';
    public $timestamps = false;

    public function wallet()
    {
        return $this->hasOne('App\Entity\Wallet');
    }
}
