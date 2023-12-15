<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Http\Controllers\Controller;
use App\Models\Gym;
use Illuminate\Support\Facades\Auth;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        $gyms = Gym::all();


        //$groups = Group::paginate(10);
        //$gyms = Gym::with('group')->get();

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


            'name' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'email' => 'required',

        ]);

        Gym::create([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now()

        ]);
        return to_route('admin.gyms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gym $gym)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        $groups = $gym->groups;
        return view('admin.gyms.show', compact('gym', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gym $gym)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $groups = Group::all();
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
            'name' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'email' => 'required',


        ]);




        $gym->update([
            'name' => $request->name,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'email' => $request->email,



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

        // Dissociate associated groups without modifying gym_id
        $gym->groups->each(function ($group) {
            $group->gym()->dissociate();
            $group->save();
        });

        // Delete the gym
        $gym->delete();

        return redirect()->route('admin.gyms.index')->with('success', 'Gym deleted successfully');
    }


}


