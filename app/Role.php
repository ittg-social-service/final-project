<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    return $this->belongsTo('App\User');
}
