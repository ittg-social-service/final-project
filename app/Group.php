<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*use Illuminate\Database\Eloquent\SoftDeletes;*/

class Group extends Model
{
  /*use SoftDeletes;*/
  protected $table = 'groups';
/*  protected $dates = ['deleted_at'];*/
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
