<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Group;
Use App\Http\Controllers\Controller;
use App\Models\Gym;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //$groups = Group::paginate(10);

        $groups = Group::with('gym')->get();

        return view('admin.groups.index')->with('groups' , $groups);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $gyms = Gym::all();
        return view('admin.groups.create')->with('gyms',$gyms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->hasFile('group_image')) {
        $image = $request->file('group_image');
        $imageName = time() . '.' . $image->extension();

        $image->storeAs('public/groups', $imageName);
        $group_image_name = 'storage/groups/' . $imageName;
      }


        $request->validate([


            'group_name' => 'required',
            'group_time' => 'required',
            'group_date' => 'required',
            'group_type' => 'required',
            'group_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gym_id' => 'required'
        ]);

        Group::create([
            'group_name' => $request->group_name,
            'group_time' => $request->group_time,
            'group_date' => $request->group_date,
            'group_type' => $request->group_type,
            'group_image' => $group_image_name,
            'gym_id' =>$request->gym_id,
            'created_at' => now(),
            'updated_at' => now()

        ]);
        return to_route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $group = Group::find($id);
        return view('admin.groups.show')->with('group', $group);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $gyms = Gym::all();
        return view('admin.groups.edit', compact('group', 'gyms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {


        $user = Auth::user();
        $user->authorizeRoles('admin');



        $request->validate([
            'group_name' => 'required',
            'group_time' => 'required',
            'group_date' => 'required',
            'group_type' => 'required',
            'gym_id' => 'required',
            'group_image' => 'nullable|image',
        ]);


        $group_image_name =$group->group_image;

        if ($request->hasFile('group_image')) {
            $image = $request->file('group_image');
            $imageName = time() . '.' . $image->extension();

            $image->storeAs('public/groups', $imageName);
            $group_image_name = 'storage/groups/' . $imageName;
        }

        $group->update([
            'group_name' => $request->group_name,
            'group_time' => $request->group_time,
            'group_date' => $request->group_date,
            'group_type' => $request->group_type,
            'gym_id' => $request->gym_id,
            'group_image' => $group_image_name,

        ]);

        return to_route('admin.groups.show', $group)->with('success','Book updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {


        $user = Auth::user();
        $user->authorizeRoles('admin');


        $group->delete();
        return to_route('admin.groups.index')->with('success', 'Book deleted successfully');
    }
}
