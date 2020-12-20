<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'active' => 'boolean'
    ];

    public function getPreviewAttribute()
    {
        $value = $this->attributes['string'];
        return mb_strlen($value) > 20 ? mb_substr($value, 0, 17).'...' : $value;
    }
}
