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


        $gyms = Gym::with('group')->get();

        return view('admin.gyms.index')->with('gyms', $gyms);
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


}


