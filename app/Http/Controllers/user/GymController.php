<?php

namespace App\Http\Controllers\User;

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
        $user->authorizeRoles('user');

        $gyms = Gym::all();


       // $gyms = Gym::with('group')->get();

        return view('user.gyms.index')->with('gyms', $gyms);
    }


    /**
     * Display the specified resource.
     */
    public function show(Gym $gym)
    {

        $user = Auth::user();
        $user->authorizeRoles('user');

        if (!Auth::id()) {
            return abort(403);
        }

        $groups = $gym->groups;
        return view('user.gyms.show', compact('gym', 'groups'));
    }


}


