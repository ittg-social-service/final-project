<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;
use App\RoleUser;
use Auth;
use Image;

class TutorController extends Controller
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
       

        if (Auth::user()->hasRole('department_manager')) {
            return view('HeadOfDepartment.tutors.create');
        }else{
            return view('coordinator.tutors.create');
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
        if ($request->has('hod')) {
            $login_user = Auth::user();
            if ($login_user->tutor) {
                 return response()->json(['status' => '0']);
            }
            $role_user = new RoleUser;
            $role_user->user_id = $login_user->id;
            $role_user->role_id = 2;
            $tutor = new Tutor;
            $role_user->save();
            $tutor->user_id = $login_user->id;
            $tutor->department_manager_id = $login_user->department_manager->id;
            $tutor->save();
            return response()->json(['status' => '1']);
        }else{
            $this->validate($request, [
                'name' => 'bail|required|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
                'first_lastname' => 'bail|required|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
                'second_lastname' => 'bail|required|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
                'username' => 'bail|required|unique:users',
            ]);

            $user = new User;
            $user->username = $request->username;
            $user->name = $request->name;
            $user->first_lastname = $request->first_lastname;
            $user->second_lastname = $request->second_lastname;
            $user->email = str_random(10).'@gmail.com';
            $user->phone = str_random(10);
            $user->avatar = '/img/avatars/default.png';
            $user->password = bcrypt($request->username);
            $user->save();

            $role_user = new RoleUser;
            $role_user->user_id = $user->id;
            $role_user->role_id = 2;
            $role_user->save();

            $tutor = new Tutor;
            $tutor->user_id = $user->id;
            
            $tutor->department_manager_id = Auth::user()->department_manager->id;
            $tutor->save();
            return redirect('/jefe-departamento/tutores/crear')->with('status', 'Tutor Guardado exitosamente');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutor = User::find($id)->tutor;

        return response()->json(['tutor' => $tutor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (Auth::user()->hasRole('department_manager')) {
            return view('HeadOfDepartment.tutors.update', ['target' => $user]);
        }else{
            return view('coordinator.tutors.update', ['target' => $user]);
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
         if ($user->username != $request->username) {
            $toValidate['username'] = 'bail|required|unique:users';
        }
        
        $this->validate($request, $toValidate);

          $avatar = "";

          if ($request->hasFile('avatar')) {
              $avatar = $request->file('avatar');
              $fileName = Auth::user()->username . '_'. $id . '.' . $avatar->getClientOriginalExtension();
              Image::make($avatar)->resize(300, 300)->save( public_path('/avatars/' . $fileName) );
              $avatar = '/avatars/' . $fileName;
          }else{
              $avatar = $user->avatar;
          }


          $user->name = ucfirst($request->name);
          $user->first_lastname = ucfirst($request->first_lastname);
          $user->second_lastname = ucfirst($request->second_lastname);
          $user->email = $request->email;
          $user->username = $request->username;
          $user->avatar = $avatar;
          $user->phone = $request->phone;
          $user->save();
        

        if (Auth::user()->hasRole('department_manager')) {
            return redirect('/jefe-departamento/tutores')->with('status', 'Informacion del tutor actualizada');
        }else{
            return redirect('/coordinador/tutores')->with('status', 'Informacion del tutor actualizada');;
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
        $tutors = Tutor::whereNotIn('id', [1])->get();
        foreach ($tutors as $tutor) {
            array_push($toReturn, $tutor->user);
        }
        return response()->json($toReturn);
    }
    public function groupsForTutor( $id )
    {

        $tutors = Tutor::find($id)->groups;

        return response()->json($tutors->toArray());
    }
}
