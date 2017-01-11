<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'nc' => 'unique:users',
        ]);

        $user = new User;
        $user->nc = $request->nc;
        $user->name = str_random(10);
        $user->first_lastname = str_random(10);
        $user->second_lastname = str_random(10);
        $user->email = str_random(10).'@gmail.com';
        $user->phone = str_random(10);
        $user->avatar = '/img/avatars/default.png';
        $user->password = bcrypt($request->nc);
        $user->role_id = 1;
        $user->save();

        $student = new Student;
        $student->period_id = $request->period;
        $student->group_id = 1; //fake group
        $student->user_id = $user->id; 
        $student->career_id = 1; // fake career 
        $student->semester_id = 1; 
        $student->save();

        return response()->json(['status' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::find($id)->student;

        return response()->json(['info' => $student]);
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
        $student = User::find($id)->student;
        $student->group_id = $request->group;
        $student->save();
        return response()->json(['group' => $student]);
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

    public function all()
    {
        $toReturn = [];
        $students = Student::all();
        foreach ($students as $student) {
            array_push($toReturn, $student->user);
        }
        return response()->json($toReturn);
    }
    public function allInPeriod( $periodId )
    {
        $toReturn = [];
        $students = Student::where('period_id', $periodId)->get();
        foreach ($students as $student) {
            array_push($toReturn, $student->user);
        }
        return response()->json($toReturn);
    }
     public function groupForStudent( $id )
    {
     
        $group = User::find($id)->student->group;

        return response()->json(['group' => $group]);
    }

}
