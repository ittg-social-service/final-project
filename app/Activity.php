<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Homework;
class Activity extends Model
{

  public function tutors()
  {
    return $this->belongsToMany('App\Tutor')->withPivot('enabled', 'finish_date');
  }
  public function getTotalAttribute()
  {
    return Homework::where([['activity_id',$this->id],['status',1]])->count();
  }


}
