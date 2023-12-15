<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        $members = Member::all();


        //$groups = Group::paginate(10);
        //$gyms = Gym::with('group')->get();

        return view('admin.members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $groups = Member::all();
        return view('admin.members.create')->with('groups', $groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {




        $request->validate([


            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'creditcard_no'=> 'required',

        ]);

        Member::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'creditcard_no' => $request->creditcard_no,
            'created_at' => now(),
            'updated_at' => now()

        ]);
        return to_route('admin.members.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        $groups = $member->groups;
        return view('admin.members.show', compact('member', 'members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $groups = Group::all();
        return view('admin.members.edit', compact('member', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {


        $user = Auth::user();
        $user->authorizeRoles('admin');



        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'creditcard_no'=> 'required',


        ]);




        $member->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'creditcard_no' => $request->creditcard_no,



        ]);

        return to_route('admin.members.show', $member)->with('success', 'Gym updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Dissociate associated groups without modifying gym_id
        $member->members->each(function ($member) {
            $member->gym()->dissociate();
            $member->save();
        });

        // Delete the gym
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member deleted successfully');
    }
}
