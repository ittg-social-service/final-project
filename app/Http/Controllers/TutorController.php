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
        $user->role_id = 2;
        $user->save();

        $tutor = new Tutor;
        $tutor->user_id = $user->id;
        $tutor->department_manager_id = Auth::user()->department_manager->id;
        $tutor->save();
  
        return redirect('/jefe-departamento/tutores/crear');
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
