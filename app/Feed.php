<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $dates = ['warranty_end_date'];

    protected $appends = ['warrantyDateHumanReadable'];

    public function getWarrantyDateHumanReadableAttribute()
    {
        return $this->warranty_end_date->diffForHumans();
    }
}
