<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
  protected $fillable = [
    'perdiod',' year',
  ];
  protected $table = 'periods';
  public function groups()
  {
    return $this->hasMany('App\Group');
  }
}
