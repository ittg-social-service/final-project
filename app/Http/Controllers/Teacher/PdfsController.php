<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
class PdfsController extends Controller
{
  public function Makepdf($id)
  {
    $group= Group::findOrFail($id);
    $students = $group->students;


    $pdf = \PDF::loadView('group-pdf',['group'=>$group,'students'=>$students]);
    return  $pdf->stream('lista.pdf');
  }
}
