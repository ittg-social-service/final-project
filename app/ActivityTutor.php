<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class ActivityTutor extends Model
{
  protected $table = 'activity_tutor';
  protected $fillable = [
    'activity_id','tutor_id','group_id','enabled','finish_date',
  ];

  protected $dates = [
    'finish_date','created_at',
  ];

  public function getFinishDAttribute()

  {
      if(($this->finish_date->gt(Carbon::now( )))){
        return true;
      }
      else{
        return false;
      }
  }
  public function activity()
  {
    return $this->hasOne('App\Activity');
  }
  public function students()
  {
    return $this->belongsToMany('App\Student')->withPivot('group_id', 'file');;
  }
  public function getTotalAttribute()
  {
    return Homework::where([['activity_id',$this->activity_id],['status',1],['group_id',$this->group_id]])->count();
  }
}
