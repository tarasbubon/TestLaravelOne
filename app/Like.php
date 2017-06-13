<?php

namespace TestLaravelOne;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use Uuids;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('TestLaravelOne\User');
    }

    public function post()
    {
        return $this->belongsTo('TestLaravelOne\Post');
    }
}
