<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    public function task() {
        return $this->hasMany('App\task')->orderBy('priority', 'asc');
    }
}
