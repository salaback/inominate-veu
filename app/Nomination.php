<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    protected $fillable = ['nominee_id', 'office', 'district', 'count'];

    public function support()
    {
        return $this->hasMany(NominationSupport::class);
    }

    public function nominee()
    {
        return $this->belongsTo(Nominee::class);
    }

}
