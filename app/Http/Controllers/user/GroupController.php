<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Group;
Use App\Http\Controllers\Controller;
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

        $groups = Group::paginate(10);
        return view('user.groups.index')->with('groups' , $groups);
    }


    public function show(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        $group = Group::find($id);
        return view('user.groups.show')->with('group', $group);
    }
}

