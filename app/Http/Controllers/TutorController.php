<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;
use Auth;

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
        if (Auth::user()->role->type == 'department_manager') {
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
        $this->validate($request, [
            'name' => 'bail|required|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
            'first_lastname' => 'bail|required|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
            'second_lastname' => 'bail|required|regex:/^([a-zA-Z]+\s)*[a-zA-Z]+$/',
            'nc' => 'bail|required|unique:users',
        ]);

        $user = new User;
        $user->nc = $request->nc;
        $user->name = $request->name;
        $user->first_lastname = $request->first_lastname;
        $user->second_lastname = $request->second_lastname;
        $user->email = str_random(10).'@gmail.com';
        $user->phone = str_random(10);
        $user->avatar = '/img/avatars/default.png';
        $user->password = bcrypt($request->nc);
        $user->role_id = 2;
        $user->save();

        $tutor = new Tutor;
        $tutor->user_id = $user->id;
        $tutor->department_manager_id = Auth::user()->department_manager->id;
        $tutor->save();

        if (Auth::user()->role->type == 'department_manager') {
            return redirect('/jefe-departamento/tutores/crear')->with('status', 'Tutor Guardado exitosamente');
        }else{
            return redirect('/coordinador/tutores/crear')->with('status', 'Tutor Guardado exitosamente');;
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
