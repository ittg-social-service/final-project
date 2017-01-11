<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use DB;
use Auth;
use App\User;
use App\Tutor;

class GroupController extends Controller
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
            'key' => 'bail|unique:groups'
        ]);
        $group = new Group;
        $group->key = $request->key;
        $group->period_id = $request->period;
        $group->coordinator_id = Auth::user()->coordinator->id; // deberia ser el id del coordinador que lo registra es decir el que esta logueado
        $group->tutor_id = 1; //id del tutor creado por defecto
        $group->save();
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
        $group = Group::find($id);
        $group->tutor_id = Tutor::find($request->tutor)->id;
        $group->save();
        return response()->json($request->tutor);
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
        //grupos que no son el group con id 1 qu es el group por defecto
        //grupos donde el id del tutor es 1 quiere decir que no ah sido asignado
        $groups = Group::whereNotIn('id', [1])->get();
        return response()->json($groups->toArray());
    }
     public function allInPeriod( $periodId )
    {
        $groups = DB::table('groups')->where([
                                                ['period_id', '=' ,$periodId],
                                                ['id', '!=' , 1]
                                            ])->get();
        return response()->json($groups->toArray());
    }
    public function students( $groupId )
    {
        $toReturn = [];
        $students = Group::find($groupId)->students;
        foreach ($students as $student) {
            array_push($toReturn, $student->user);
        }
        return response()->json($toReturn);

    }

    public function tutorForGroup( $groupId )
    {
        $tutor = Group::find($groupId)->tutor->user;

        return response()->json(['tutor' => $tutor]);
    }

}
