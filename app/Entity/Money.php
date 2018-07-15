<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Money extends Pivot
{
    public $timestamps = false;
    protected $table = 'money';
}
