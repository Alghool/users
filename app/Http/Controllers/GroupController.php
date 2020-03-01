<?php

namespace App\Http\Controllers;

use App\Group;
use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list_group');
        return view('group.list', ['groups' => Group::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('add_group');

        return view('group.add', ['permissions' => Permission::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('add_group');
        $data = $this->verifyGroup($request);
//
        $group = Group::create($data);
        $group->permissions()->attach($request->input('permissions'));

         return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $this->authorize('edit_group');
        $myPermissions =  $group->permissions->map(function ($item, $key) {
            return ($item->pivot->value == 1)? $item->id : 0;
        });
        $data = [
            'id' => $group->id,
            'name' => $group->name,
            'myPermissions' => $myPermissions->flatten()->toArray(),
            'permissions' => Permission::all()
            ];
        return view('group.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->authorize('edit_group');
        $data = $this->verifyGroup($request);
//
        $group->update($data);

        $group->permissions()->sync($request->input('permissions'));

        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $this->authorize('remove_group');
        if($group->is_core) abort(403, 'Unauthorized action.');
        $defaultGroup = Group::where('is_default', 1)->first();
        $group->users()->update(['group_id'=> $defaultGroup->id]);
        $group->permissions()->detach();
        $group->delete();
        return redirect()->route('group.index');
    }

    private function verifyGroup(Request $request){
        return $request->validate(Group::$validationRoles);
    }
}
