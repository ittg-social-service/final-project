<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function tutor()
  {
    return $this->belongsTo('App\Tutor');
  }
  public function students()
  {
    return $this->hasMany('App\Student');
  }
}
