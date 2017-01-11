<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

  public function tutors()
  {
    return $this->belongsToMany('App\Tutor')->withPivot('enabled', 'finish_date');
  }
}
