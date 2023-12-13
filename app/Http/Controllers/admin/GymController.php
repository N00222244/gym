<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Controllers\Controller;
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

        $gyms = Gym::with('group')->get();

        return view('admin.gyms.index')->with('gyms', $gyms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $groups = Group::all();
        return view('admin.gyms.create')->with('groups', $groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->hasFile('gym_image')) {
            $image = $request->file('gym_image');
            $imageName = time() . '.' . $image->extension();

            $image->storeAs('public/gyms', $imageName);
            $gym_image_name = 'storage/gyms/' . $imageName;
        }


        $request->validate([


            'gym_name' => 'required',
            'gym_time' => 'required',
            'gym_date' => 'required',
            'gym_type' => 'required',
            'gym_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'group_id' => 'required'
        ]);

        Gym::create([
            'gym_name' => $request->gym_name,
            'gym_time' => $request->gym_time,
            'gym_date' => $request->gym_date,
            'gym_type' => $request->gym_type,
            'gym_image' => $gym_image_name,
            'group_id' => $request->group_id,
            'created_at' => now(),
            'updated_at' => now()

        ]);
        return to_route('gyms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $gym = Gym::find($id);
        return view('admin.gyms.show')->with('gym', $gym);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gym $gym)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $gyms = Group::all();
        return view('admin.gyms.edit', compact('gym', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gym $gym)
    {


        $user = Auth::user();
        $user->authorizeRoles('admin');



        $request->validate([
            'gym_name' => 'required',
            'gym_time' => 'required',
            'gym_date' => 'required',
            'gym_type' => 'required',
            'group_id' => 'required',
            'gym_image' => 'nullable|image',
        ]);


        $gym_image_name = $gym->gym_image;

        if ($request->hasFile('gym_image')) {
            $image = $request->file('gym_image');
            $imageName = time() . '.' . $image->extension();

            $image->storeAs('public/gyms', $imageName);
            $gym_image_name = 'storage/gyms/' . $imageName;
        }

        $gym->update([
            'gym_name' => $request->gym_name,
            'gym_time' => $request->gym_time,
            'gym_date' => $request->gym_date,
            'gym_type' => $request->gym_type,
            'group_id' => $request->group_id,
            'gym_image' => $gym_image_name,

        ]);

        return to_route('admin.gyms.show', $gym)->with('success', 'Gym updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gym $gym)
    {


        $user = Auth::user();
        $user->authorizeRoles('admin');


        $gym->delete();
        return to_route('admin.gyms.index')->with('success', 'Gym deleted successfully');
    }
}


