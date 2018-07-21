<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "currency";

    public function money(){
        return $this->hasMany(Money::class);
    }
}
