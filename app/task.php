<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    public function projects() {
        return $this->belongsTo('App\projects');
    }
}
