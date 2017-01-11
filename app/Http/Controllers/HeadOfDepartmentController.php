<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Tutor;
use App\Group;
use App\DepartmentManager;
use Auth;
use Image;
use App\User;

class HeadOfDepartmentController extends Controller
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
        return View('HeadOfDepartment.index');
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
        //
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
        $toValidate = array(
                            'name' => 'bail|required',
                            'first_lastname' => 'bail|required',
                            'second_lastname' => 'bail|required',
                            'phone' => 'bail|required|digits:10' );
        $user = Auth::user();
        if ($user->email != $request->email) {
            $toValidate['email'] = 'bail|required|unique:users';
        }
        
        $this->validate($request, $toValidate);

        $avatar = "";
      
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = Auth::user()->department_manager->id . '_'. $id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/hod/' . $fileName) );
            //Cloudder::upload($avatar, $fileName);
           // $uplo = Cloudder::getResult();
            $avatar = '/uploads/avatars/hod/' . $fileName;
        }else{
            $avatar = $user->avatar;
        }

        $user->name = $request->name;
        $user->first_lastname = $request->first_lastname;
        $user->second_lastname = $request->second_lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->avatar = $avatar;
        $user->save();

        return redirect('/jefe-departamento');

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

    /**
     * Retorna vista con la lista de students registrados 
     * y la opcion de registrar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function students()
    {
        $students = Student::all();
        return view('HeadOfDepartment.students.index', ['students' => $students]);
    }
     public function createStudent()
    {
        
        return view('HeadOfDepartment.students.create');
    }
     public function updateStudent()
    {
        
        return view('HeadOfDepartment.students.update');
    }
    public function tutors()
    {
       
        return view('HeadOfDepartment.tutors.index');
    }
     public function createTutor()
    {
        
        return view('HeadOfDepartment.tutors.create');
    }
     public function updateTutor()
    {
        
        return view('HeadOfDepartment.tutors.update');
    }

    public function assignments()
    {
        $tutors = Tutor::whereNotIn('id', [1])->get();
        $gruops = Group::whereNotIn('id', [1])->get();
        return view('HeadOfDepartment.assignments.index', ['tutors' => $tutors, 'gruops' => $gruops]);
    }
    public function profile()
    {
       $target = Auth::user();
       return view('HeadOfDepartment.profile',['target' => $target]);

    }
}
