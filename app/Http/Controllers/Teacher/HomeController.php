<?php

namespace App\Http\Controllers\Teacher;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Tutor;
use App\User;
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
      $user = User::find($id);
      return view('teacher.updateInfo',compact('user'));
    }
    public function updateTeacher($id)
    {
      $user = User::find($id);
      dd("paso");
    }
}
