<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $query = Admin::with('roles');

        if ($request->has('role_id') && $request->role_id !== null && $request->role_id !== '') {
            $query->where('role_id', $request->role_id);
        }

        $admins = $query->paginate(10);

        $roles = Roles::where('active', 1)->get();

        return view('layout.admin', compact('admins', 'roles'));
    }

    public function getRoleList()
    {
        $roles = Roles::where('active', 1)->get();
        return view('layout.register', compact('roles'));
    }
}
