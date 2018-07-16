<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Money extends Pivot
{
    use SoftDeletes;

    const DELETED_AT = 'deleted';
    protected $dates = ['deleted'];

    public $timestamps = false;
    protected $table = 'money';

}
