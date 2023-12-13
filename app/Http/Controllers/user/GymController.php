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
    public function show(string $id)
    {

        $user = Auth::user();
        $user->authorizeRoles('user');

        $gym = Gym::find($id);
        return view('user.gyms.show')->with('gym', $gym);
    }


}


