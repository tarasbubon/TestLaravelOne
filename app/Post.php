<?php

namespace TestLaravelOne;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
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
}
