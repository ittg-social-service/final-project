<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Homework extends Model
{
  protected $table = 'activity_student_teacher';

  protected $fillable  = [
    'student_id','activity_id','tutor_id','group_id','file',
  ];

  protected $dates = [
    'created_at',
  ];
}
