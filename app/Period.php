<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
  protected $table = 'periods';
  public function group()
  {
    return $this->hasMany('App\Group');
  }
}
