<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcent extends Model
{
    protected $guarded = [];
    protected $table = 'parent';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
