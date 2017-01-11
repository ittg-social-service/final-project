<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Group;
use App\Tutor;
use Illuminate\Support\Facades\DB;
use App\ActivityTutor;
use Auth;
class GroupsController extends Controller
{
  public function index()
  {
    $teacher = Auth::user()->tutor->id;
    $groups = Tutor::find($teacher)->groups;
    //dd($groups);
    return view('teacher.groups',['groups'=>$groups,'enabled'=>false]);
  }
  public function show($id,$semester)
  {
    $activities = Activity::all()->where('semester_id', $semester);
    $group_id = $id;
    return view('teacher.home',['activities'=>$activities,'group_id'=>$group_id]);
  }
  public function show_activity($id_group,$id_activity)
  {
    $is_update = ActivityTutor::where([
      ['activity_id', '=', $id_activity],
      ['tutor_id', '=', Auth::user()->tutor->id],
      ['group_id', '=', $id_group],
    ])->first();
    $activity = Activity::findOrFail($id_activity);
    $group = Group::findOrFail($id_group);
    return view('teacher.activity.show',['activity'=>$activity,'group'=>$group,'is_update'=>$is_update]);
  }
  public function showStudents($id)
  {
    $students = Group::findOrFail($id)->students;
    return view('teacher.students',['students'=>$students]);
  }
}
