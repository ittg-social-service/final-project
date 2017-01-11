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
        return view('coordinator.index');
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
                            'lastn1' => 'bail|required',
                            'lastn2' => 'bail|required',
                            'phone' => 'bail|required|digits:10' );
        $coord = Coordinator::find($id);
        if ($coord->email != $request->email) {
            $toValidate['email'] = 'bail|required|unique:users';
        }
        
        $this->validate($request, $toValidate);
        $user = User::where([
                                ['usertype_id', '=', $id],
                                ['role_id', '=', 4]
                            ])->first();
        $photo = "";
      
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = Auth::user()->usertype_id . '_'. $id . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(300,300)->save( public_path('/uploads/avatars/coord/' . $fileName) );
            //Cloudder::upload($photo, $fileName);
           // $uplo = Cloudder::getResult();
            $photo = '/uploads/avatars/coord/' . $fileName;
        }else{
            $photo = $coord->photo;
        }

        $coord->name = $request->name;
        $coord->lastn1 = $request->lastn1;
        $coord->lastn2 = $request->lastn2;
        $coord->phone = $request->phone;
        $coord->email = $request->email;
        $coord->photo = $photo;
        $coord->save();
        $user->name = $coord->name;
        $user->lastn1 = $coord->lastn1;
        $user->lastn2 = $coord->lastn2;
        $user->email = $coord->email;
        $user->photo = $coord->photo;
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
       $target = Coordinator::find(Auth::user()->usertype_id);
       return view('coordinator.profile',['target' => $target]);

    }
}
