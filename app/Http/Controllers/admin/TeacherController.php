<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = teacher::orderBy('id', 'asc')
            ->paginate(5);
        return view('admin.teacher.index', compact(var_name: 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date_of_birth'=> 'required',
            'address'=> 'required',



        ]);
        teacher::create($request->post());
        return redirect()->route('teacher.index')->with('sucess','teacher has been created sucessfully');

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
        $data=[];
        $data ['row']=teacher::find($id);
        return view('admin.teacher.edit',compact(var_name: 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teacher $teacher)
    {
        $request->validate([
            'name' =>'required',
            'address' =>'required',
            'email' =>'required',
            'date_of_birth' =>'required',

        ]);
        $teacher-> fill($request->post())->save();
        return redirect()->route('teacher.index')->with('sucess','teacher has been updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('sucess','teacher has been deleted sucessfully');
    }
}
