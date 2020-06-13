<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $guarded = [];

    public function contact(){
        return $this->belongsTo(Cotact::class);
    }
}
