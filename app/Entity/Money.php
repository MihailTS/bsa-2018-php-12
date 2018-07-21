<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Money extends Model
{
    use SoftDeletes;

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }
}
