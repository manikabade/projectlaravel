<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

        {
            $users = User::orderBy('id', 'asc')
                ->paginate(5);
            return view('admin.user.index', compact(var_name: 'users'));
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password'=> 'required'

            ]);
            $data = $request->post();
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            return redirect()->route('user.index')->with('success','user has been created sucessfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
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
        $data ['row']=User::find($id);
        return view('admin.user.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        {
            $request->validate([
                'name' =>'required',
                'address' =>'required',
                'password' =>'required',
            ]);
            $user-> fill($request->post())->save();
            return redirect()->route('user.index')->with('sucess','user has been updated sucessfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('sucess','user has been deleted sucessfully');
    }

}
