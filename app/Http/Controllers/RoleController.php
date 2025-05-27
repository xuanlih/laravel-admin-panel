<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RoleController extends Controller
{
    public function role()
    {
        $roles = Roles::where('active', 1)->get();
        return view('layout.role', compact('roles'));
    }

    public function addRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'required|string',
            'active' => 'required|in:0,1'
        ]);

        try {
            Roles::create([
                'name' => $request->name,
                'description' => $request->description,
                'active' => $request->active,
            ]);

            return redirect()->route('role')->with('success', 'Add role successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Add role failed!');
        }
    }
}
