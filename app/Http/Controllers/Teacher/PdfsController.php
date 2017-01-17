<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use Illuminate\Support\Facades\DB;

class PdfsController extends Controller
{
  public function Makepdf($id)
  {
    $students= Group::find($id)->students;
    $info_group = DB::table('groups')->where('groups.id', $id)
                                      ->join('periods','groups.id','=','periods.id')
                                      ->select('groups.key','periods.period','periods.year')
                                      ->first();
    $pdf = \PDF::loadView('group-pdf',['info_group'=>$info_group,'students'=>$students]);
    return  $pdf->stream('lista.pdf');
  }
}
