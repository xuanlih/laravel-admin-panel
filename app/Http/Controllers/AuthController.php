<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Roles;

class AuthController extends Controller
{
    public function login(Request $request)
    {   
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = DB::table('admin')->where('username', $request->username)->first();
        if(!$admin) return redirect()->back()->with('error', 'Invalid user!');

        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->back()->with('error', 'Invalid password!');
        }
        return redirect()->route('home')->with('success', 'Login successful!');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admin,username',
            'name' => 'required|unique:admin,name',
            'email' => 'nullable|email|unique:admin,email',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,id',
        ]);

        try {
            Admin::create([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role,
            ]);

            return redirect()->route('admin')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registration failed!');
        }
    }

    public function edit($id)
    {
        try{
            $admin = Admin::findOrFail($id);
            $roles = Roles::where('active', 1)->get();

            return view('layout.edit', compact('admin', 'roles'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Edit failed!');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:admin,username,' . $id,
            'name' => 'required|unique:admin,name,' . $id,
            'email' => 'nullable|email|unique:admin,email,' . $id,
            'role_id' => 'required|exists:roles,id',
        ]);

        try{
            $admin = Admin::findOrFail($id);
            $admin->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
            ]);

            return redirect()->route('admin')->with('success', 'Admin updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Admin updated failed!');
        }
    }
}