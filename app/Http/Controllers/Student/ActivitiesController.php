<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use Auth;
use App\Homework;
use App\ActivityTutor;
class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('pasó');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $activity_id = $request->activity_id;

        $file = $request->file('file');
        $name = $file->getClientOriginalName();

        $real_name = Auth::user()->username.'actividad-'.$activity_id.'.pdf';
        $path = 'homeworks/'.$real_name;
        $request->file('file')->move('homeworks',$real_name);

        Homework::create([
          'student_id' => Auth::user()->student->id,
           'activity_id' => $request->activity_id,
           'tutor_id' => Auth::user()->student->group->tutor_id,
           'group_id' => Auth::user()->student->group->id,
           'file' => $path,
        ]);

        flash('Hecho.', 'success');
        return redirect('student/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$id2)
    {
      $activity = Activity::findOrFail($id);
      $homework = ActivityTutor::findOrFail($id2);
      $enabled = Homework::where([
        ['student_id','=',Auth::user()->student->id],
        ['activity_id','=',$id],
      ])->first();

      if($enabled==null){
          $extra = null;
      }
      else{
          $extra = $enabled->observations;
      }
      return view('student.activities.show',compact('activity','homework','enabled','extra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
