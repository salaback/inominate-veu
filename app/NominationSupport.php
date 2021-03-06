<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NominationSupport extends Model
{
    protected $fillable = ['user_id', 'nomination_id', 'contribution', 'walk', 'call', 'host', 'yardSign', 'signPetition', 'statement'];

    public function nomination()
    {
        return $this->belongsTo(Nomination::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
