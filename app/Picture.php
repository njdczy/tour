<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function setPicturesAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['pictures'] = json_encode($pictures);
        }
    }

    public function setPictures2Attribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['pictures2'] = json_encode($pictures);
        }
    }

    public function setPictures3Attribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['pictures3'] = json_encode($pictures);
        }
    }

    public function getPicturesAttribute($pictures)
    {
        return json_decode($pictures, true);
    }

    public function getPictures2Attribute($pictures)
    {
        return json_decode($pictures, true);
    }

    public function getPictures3Attribute($pictures)
    {
        return json_decode($pictures, true);
    }
}
