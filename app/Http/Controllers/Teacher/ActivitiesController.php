<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Homework;
use App\Student;
use App\ActivityTutor;
use App\Http\Requests\StoreHomework;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $homeworks = Homework::all()->where('student_id', $id);
//      dd($homeworks);
      return view('teacher.student-homework',['homeworks'=>$homeworks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomework $request)
    {

        ActivityTutor::create([
            'activity_id' => $request->activity_id,
            'tutor_id' => $request->teacher_id,
            'group_id' => $request->group_id,
            'enabled'=>1,
            'finish_date' => $request->finish_date
        ]);
        return redirect('teacher/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request,[
          'finish_date'=>'required',
        ]);

        $activity = ActivityTutor::findOrFail($id);
        $activity->finish_date = $request->finish_date;
        $activity->save();

        return redirect('teacher/groups');
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
    public function homeworks($id)
    {
      $student = Student::findOrFail($id)->user;
      $homeworks = Homework::all()->where('student_id', $id);
//      dd($homeworks);
      return view('teacher.student-homework',['homeworks'=>$homeworks,'student'=>$student]);
    }
}
