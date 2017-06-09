<?php

namespace TestLaravelOne;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
