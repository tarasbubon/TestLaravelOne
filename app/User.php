<?php

namespace TestLaravelOne;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use Uuids;
    use \Illuminate\Auth\Authenticatable;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function posts()
    {
        return $this->hasMany('TestLaravelOne\Post');
    }

    public function likes()
    {
        return $this->hasMany('TestLaravelOne\Like');
    }
}
