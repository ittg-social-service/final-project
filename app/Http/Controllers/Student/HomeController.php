<?php

namespace App\Http\Controllers\Student;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Group;
use Auth;
use App\User;
use App\ActivityTutor;
use App\Tutor;
use App\Student;
class HomeController extends Controller
{
    public function index(){
      $group_id = Auth::user()->student->group->id;
      $activities = DB::table('activity_teacher')
            ->join('activities', 'activity_teacher.activity_id', '=', 'activities.id')
            ->select('activities.*','activity_teacher.id as id_activity_teacher')
            ->where('activity_teacher.group_id','=',$group_id)
            ->orderBy('activity_teacher.created_at', 'desc')
            ->paginate(6);

      return view('student.home',['activities'=>$activities]);
    }
    public function information($id)
    {
      $user = User::findOrFail($id);
      return view('student/information',compact('user'));
    }
    public function myteacher()
    {
      $id_student = Auth::user()->student->id;
      $teacher_id = Student::findOrFail($id_student)->group->tutor_id;
      $info_teacher = Tutor::findOrFail($teacher_id);
      return view('student.teacher',['info_teacher'=>$info_teacher]);
    }
    public function updateStudent(Request $request,$id)
    {
      $id_user = Auth::user()->id;
      $this->validate($request,[
          'email' => 'required|unique:users,email,'.$id_user,
          'name' => 'required',
          'first_lastname' => 'required',
          'second_lastname' => 'required',
          'phone' => 'required|min:10',
      ]);
      $user = User::findOrFail($id);
      $user->name = ucfirst($request->name);
      $user->first_lastname = ucfirst($request->first_lastname);
      $user->second_lastname = ucfirst($request->second_lastname);
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->save();

      return redirect('student/home');


    }

}
