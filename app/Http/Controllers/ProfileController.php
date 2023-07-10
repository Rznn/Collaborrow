<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->find(Auth::user()->id);

        return view('/profile', [
            'users' => $users,
        ]);
    }

    public function edit($slug)
    {
        $users = User::where('slug', $slug)->with('roles')->first();
        return view('/profile_edit', [
            'users' => $users
        ]);
    }

    public function update(Request $request, $slug)
    {
        if (Gate::allows('manage-crud-client-adminunit')) {
            $users = User::where('slug', $slug)->first();
            $users->slug = null;
            $users->update($request->all());

            return redirect('/profile')->with('success', 'User Role Updated Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }
}
