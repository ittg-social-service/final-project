<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public function group()
  {
    return $this->belongsTo('App\Group');
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function activities()
  {
    return $this->belongsToMany('App\ActivityTutor')->withPivot('group_id', 'file');;
  }
  public function career()
  {
    return $this->belongsTo('App\Career');
  }
}
