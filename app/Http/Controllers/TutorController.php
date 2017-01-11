<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;


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
        $tutor = new Tutor;
        $tutor->name = $request->name;
        $tutor->lastn1 = $request->lastn1;
        $tutor->lastn2 = str_random(10);
        $tutor->phone = $request->phone;
        $tutor->ncontrol = $request->ncontrol;
        $tutor->email = $request->email;
        $tutor->photo = '/img/avatars/default.png';
        $tutor->head_of_department_id = 1; //deberia ser jefe de la sesion actual
        $tutor->save();
        $user = new User;
        $user->name = $tutor->name;
        $user->lastn1 = $tutor->lastn1;
        $user->lastn2 = $tutor->lastn2;
        $user->photo = $tutor->photo;
        $user->email = $tutor->email;
        $user->password = bcrypt($tutor->ncontrol);
        $user->usertype_id = $tutor->id;
        $user->role_id = 2;
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
        $tutors = Tutor::whereNotIn('id', [1])->get();
        return response()->json($tutors->toArray());
    }
}
