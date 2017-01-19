<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\Student;
use App\Group;
use App\Coordinator;
use App\User;
use Image;
use Auth;

class CoordinatorController extends Controller
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
        //return view('coordinator.index');
        return redirect('/coordinador/alumnos');
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
                            'phone' => 'bail|digits:10',
                            'avatar' => 'bail|image' );
        $user = Auth::user();
        if ($user->email != $request->email) {
            $toValidate['email'] = 'bail|required|email|unique:users';
        }
        if ($user->username != $request->username) {
            $toValidate['username'] = 'bail|required|unique:users';
        }
        if ($request->changePassword != null) {
            $toValidate['password'] =  'bail|required|min:6|confirmed';
            $toValidate['password_confirmation'] = 'bail|required|min:6';
        }
       /* dd($request);*/
        $this->validate($request, $toValidate);

        $avatar = "";
      
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = Auth::user()->coordinator->id . '_'. $id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/coord/' . $fileName) );
            //Cloudder::upload($avatar, $fileName);
           // $uplo = Cloudder::getResult();
            $avatar = '/uploads/avatars/coord/' . $fileName;
        }else{
            $avatar = $user->avatar;
        }
        if ($request->changePassword != null){
            $user->password = bcrypt($request->password);
        }
        $user->username = $request->username;
        $user->name = $request->name;
        $user->first_lastname = $request->first_lastname;
        $user->second_lastname = $request->second_lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->avatar = $avatar;
        $user->save();

        return redirect('/coordinador/perfil')->with('status', 'Su información ha sido actualizada');

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
    public function students()
    {
        
        return view('coordinator.students.index');
    }
     public function createStudent()
    {
        
        return view('coordinator.students.create');
    }
     public function updateStudent()
    {
        
        return view('coordinator.students.update');
    }
    public function tutors()
    {
       
        return view('coordinator.tutors.index');
    }
     public function createTutor()
    {
        
        return view('coordinator.tutors.create');
    }
     public function updateTutor()
    {
        
        return view('coordinator.tutors.update');
    }
    public function assignments()
    {
        $students = Student::where('group_id','=', 1)->get(); //students sin grupo asignado
        $groups = Group::whereNotIn('id', [1])->get(); //groups que no tienen id 1 que es el por defecto
        return view('coordinator.assignments.index', ['students' => $students, 'groups' => $groups]);
    }
    public function groups()
    {
        return view('coordinator.groups.index');
    }
    public function profile()
    {
       $target = Auth::user();
       return view('coordinator.profile',['target' => $target]);

    }
}
