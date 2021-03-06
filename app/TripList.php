<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripList extends Model
{
    public function setPicturesAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['pictures'] = json_encode($pictures);
        }
    }

    public function getPicturesAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

    public function trip()
    {
        return $this->belongsTo('App\Trip');
    }
}
