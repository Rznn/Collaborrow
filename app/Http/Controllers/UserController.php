<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->where('role_id', '!=', 1)->orderBy('role_id')->get();
        return view('/users', [
            'users' => $users,
        ]);
    }

    public function edit($slug)
    {
        $users = User::where('slug', $slug)->with('roles')->first();
        $roles = Roles::where('id', '!=', 1)->get();
        return view('/user_edit', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function updaterole(Request $request, $slug)
    {
        if (Gate::allows('manage-crud-admin')) {
            $users = User::where('slug', $slug)->first();
            // $users->slug = null;
            $users->role_id = $request->input('roles');
            $users->update();

            return redirect('/users')->with('success', 'User Role Updated Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function ban($slug)
    {
        $users = User::where('slug', $slug)->first();

        return view('/user_ban', [
            'users' => $users,
        ]);
    }

    public function destroy($slug)
    {
        if (Gate::allows('manage-crud-admin')) {
            $users = User::where('slug', $slug)->first();
            $users->delete();
            return redirect('/users')->with('success', 'User Banned Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function banneduser()
    {
        $banneduser = User::onlyTrashed()->get();
        return view('/user_banned_list', [
            'banneduser' => $banneduser
        ]);
    }

    public function restore($slug)
    {
        if (Gate::allows('manage-crud-admin')) {
            $users = User::withTrashed()->where('slug',$slug)->first();
            $users->restore();
            return back()->with('success', 'User Restored Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }
}
