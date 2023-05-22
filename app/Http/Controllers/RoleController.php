<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
    }

    public function subscribe()
    {
        $user = User::find(auth()->user()->id);
        $role = Role::where('role_name', 'subscriber')->first();

        $user->update(['role_id' => $role->id]);

        return redirect()->back();
    }
}
