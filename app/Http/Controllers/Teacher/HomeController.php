<?php

namespace App\Http\Controllers\Teacher;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Tutor;
use App\User;
use App\Career;
use Image;
class HomeController extends Controller
{
    public function index(){
      $activities = Activity::all();
      return view('teacher.home',['activities'=>$activities]);
    }
    public function groups(){

    }
    public function informationTeacher($id)
    {
      $careers = Career::all();
      $user = User::find($id);
      return view('teacher.updateInfo',compact('user','careers'));
    }
    public function updateTeacher(Request $request,$id)
    {
      $user = User::find($id);
      $avatar = "";

      if ($request->hasFile('avatar')) {
          $avatar = $request->file('avatar');
          $fileName = Auth::user()->nc . '_'. $id . '.' . $avatar->getClientOriginalExtension();
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


      return redirect('teacher/groups');


    }
}
