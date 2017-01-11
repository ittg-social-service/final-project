<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
  public function groups()
  {
    return $this->hasMany('App\Group');
  }
  public function activities()
  {
    return $this->belongsToMany('App\Activity')->withPivot('enabled', 'finish_date');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
