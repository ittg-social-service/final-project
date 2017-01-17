<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table = 'groups';
  protected $fillable = [
    'key','tutor_id','period_id','coordinator_id',
  ];
  public function period()
  {
    return $this->belongsTo('App\Period','period_id');
  }
  public function tutor()
  {
    return $this->belongsTo('App\Tutor');
  }
  public function students()
  {
    return $this->hasMany('App\Student');
  }

}
