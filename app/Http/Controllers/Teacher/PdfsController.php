<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Tutor;
use App\ActivityTutor;
class PdfsController extends Controller
{
  public function Makepdf($id)
  {
    $students= Group::find($id)->students;
    $info_group = DB::table('groups')->where('groups.id', $id)
                                      ->join('periods','groups.id','=','periods.id')
                                      ->select('groups.key','periods.period','periods.year')
                                      ->first();
    $pdf = \PDF::loadView('teacher.pdfs.group-pdf',['info_group'=>$info_group,'students'=>$students]);
    return  $pdf->stream('lista.pdf');
  }
  public function statisticsPdf($id)
  {
    $group_id = $id;
    $group = Group::find($id);
    $t_students = Group::find($id)->students->count();
    $tutor_id = Auth::user()->tutor->id;
    $activities1 = Tutor::find($tutor_id)->activities()->where('group_id', $id)->get();
    $activities = ActivityTutor::where([['tutor_id',$tutor_id],['group_id', $id]])->get();

    $pdf = \PDF::loadView('teacher.pdfs.report',['group'=>$group,'t_students'=>$t_students,'activities'=>$activities]);
    return  $pdf->stream('report.pdf');
  }
}
