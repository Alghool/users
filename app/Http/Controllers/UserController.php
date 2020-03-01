<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('group_id', '>' , Auth::user()->group_id)->get();

        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('add_user');
        $data['groups'] = Group::where('id','>', Auth::user()->group_id)->get();
        return view('user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('add_user');
        $data = $this->verifyUser($request);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('user.index');
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
        $this->authorize('edit_user');
        $data = User::findOrFail($id);
        $data['groups'] = Group::where('id','>', Auth::user()->group_id)->get();
       return view('user.edit', $data);
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
        $this->authorize('edit_user');
        User::$validationRoles['email'] .= ',email,'.$id;
        User::$validationRoles['username'] .= ',username,'.$id;
        $data = $this->verifyUser($request);
        $data['password'] = Hash::make($data['password']);
        User::whereId($id)->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('remove_user');
        User::findorFail($id)->delete();
        return redirect()->route('user.index');
    }


    private function verifyUser(Request $request){
        Validator::extend('valid_username', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        return $request->validate(User::$validationRoles);
    }
}
