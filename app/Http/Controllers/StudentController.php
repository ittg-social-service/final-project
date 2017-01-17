<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use DB;
use Auth;
use App\Period;
use Image;

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
        if (Auth::user()->role->type == 'department_manager') {
            return view('HeadOfDepartment.students.create');
        }else{
            return view('coordinator.students.create');
        }
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
        /*nc.name,first_last,second_last,email,phone,avatar,password,periodo,carrera
            tablas: user,student,period,career
        */
        $user = User::find($id);
        $periods = Period::all();
        $period = $user->student->period;
        if (Auth::user()->role->type == 'department_manager') {
            return view('HeadOfDepartment.students.update', ['target' => $user, 'user_period' => $period, 'periods' => $periods]);
        }else{
            return view('coordinator.students.update', ['target' => $user, 'user_period' => $period, 'periods' => $periods]);
        }
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
        $user = User::find($id);
        $student = $user->student;
        /*when is assgned to a group*/
        if ($request->has('group')) {
            $student->group_id = $request->group;
            $student->save();
            return response()->json(['group' => $student]);
        }

        $toValidate = [
            'name' => 'required',
            'first_lastname' => 'required',
            'second_lastname' => 'required',
            'phone' => 'bail|digits:10',
            'avatar' => 'bail|image'
        ];
        if ($user->email != $request->email) {
            $toValidate['email'] = 'bail|required|email|unique:users';
        }
         if ($user->nc != $request->nc) {
            $toValidate['nc'] = 'bail|required|unique:users';
        }
        
        $this->validate($request, $toValidate);

          $avatar = "";

          if ($request->hasFile('avatar')) {
              $avatar = $request->file('avatar');
              $fileName = Auth::user()->nc . '_'. $id . '.' . $avatar->getClientOriginalExtension();
              Image::make($avatar)->resize(300, 300)->save( public_path('/avatars/' . $fileName) );
              $avatar = '/avatars/' . $fileName;
          }else{
              $avatar = $user->avatar;
          }

          $id_user = Auth::user()->id;

          $user->name = ucfirst($request->name);
          $user->first_lastname = ucfirst($request->first_lastname);
          $user->second_lastname = ucfirst($request->second_lastname);
          $user->email = $request->email;
          $user->nc = $request->nc;
          $user->avatar = $avatar;
          $user->phone = $request->phone;
          $user->save();
          if (Auth::user()->role->type == 'department_manager') {
            return redirect('/jefe-departamento/alumnos')->with('status', 'Informacion del alumno actualizada');
        }else{
            return redirect('/coordinador/alumnos')->with('status', 'Informacion del alumno actualizada');;
        }
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
        $student = User::find($id)->student; //informacion extra del estudiante carrera,semestre
        $group = $student->group; // informacion del grupo del estudiante
        $tutor = $group->tutor->user; //informacion del tutor del alumno

        return response()->json(['group' => $group, 'tutor' => $tutor, 'student' => $student]);
    }

}
