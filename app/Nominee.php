<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
