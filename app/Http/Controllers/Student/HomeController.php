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
use App\Career;
use Image;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index(){
      $now = Carbon::now();
      $group_id = Auth::user()->student->group->id;
      $activities = DB::table('activity_tutor')
            ->join('activities', 'activity_tutor.activity_id', '=', 'activities.id')
            ->select('activities.*','activity_tutor.id as id_activity_tutor','activity_tutor.finish_date')
            ->where('activity_tutor.group_id','=',$group_id)
            ->orderBy('activity_tutor.created_at', 'desc')
            ->paginate(6);

      return view('student.home',['activities'=>$activities,'now'=>$now]);
    }
    public function information($id)
    {
      $user = User::findOrFail($id);
      $careers = Career::all();
      return view('student/information',compact('user','careers'));
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
      $user = User::find($id);
      $avatar = "";

      if ($request->hasFile('avatar')) {
          $avatar = $request->file('avatar');
          $fileName = Auth::user()->username. '_'. $id . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(250, 150)->save( public_path('avatars/' . $fileName) );
          $avatar = 'avatars/' . $fileName;
      }else{
          $avatar = $user->avatar;
      }

      $id_user = Auth::user()->id;
      $this->validate($request,[
          'email' => 'required|unique:users,email,'.$id_user,
          'name' => 'required',
          'first_lastname' => 'required',
          'password' => 'min:6',
          'second_lastname' => 'required',
          'phone' => 'required|min:10',
      ]);

      $user->name = ucfirst($request->name);
      $user->first_lastname = ucfirst($request->first_lastname);
      $user->second_lastname = ucfirst($request->second_lastname);
      $user->email = $request->email;
      $user->avatar = $avatar;
      $user->phone = $request->phone;
      if ($request->password) {
        $user->password = bcrypt($request->password);
      }
      $user->save();
      if($request->career_id!=null){
        $id_st = Auth::user()->student->id;
        $student = Student::find($id_st);
        $student->career_id = $request->career_id;
        $student->save();
      }

      return redirect('student/home');


    }

}
