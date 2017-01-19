<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Observation extends Model
{
    protected $table = 'observations';

    protected $fillable = [
        'comments','file','new_date','homework_id',
    ];
    protected $dates = [
      'new_date',
    ];
    public function homework()
    {
      return $this->belongsTo('App\Homework');
    }
    public function getFinishDAttribute()

    {
        if(($this->new_date->gt(Carbon::now( )))){
          return true;
        }
        else{
          return false;
        }
    }
}
