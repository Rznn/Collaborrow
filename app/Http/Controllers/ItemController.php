<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Core\File;
use App\Models\Items;
use App\Models\Units;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        $items = Items::all();
        return view('/items', [
            'items' => $items
        ]);
    }

    public function add()
    {
        $categories = Categories::all();
        $units = Units::all();
        $users = User::where('role_id', 2)->get();

        return view('/item_add', [
            'categories' => $categories,
            'units' => $units,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            Validator::make($request->all(), [
                'name' => 'required',
                'brand' => 'required',
                'description' => 'required',
            ])->validate();

            $newName = '';
            if($request->file('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
                $request->file('image')->storeAs('photo', $newName);
            }
            $request['photo'] = $newName;

            $items = Items::create($request->all());
            $items->category_id = $request->input('categories');
            $items->unit_id = $request->input('units');
            $items->user_id = $request->input('users');
            return redirect('/items')->with('success', 'Item Added Succesfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function edit($slug)
    {
        $items = Items::where('slug', $slug)->with('categories', 'units', 'users')->first();
        $categories = Categories::all();
        $units = Units::all();
        $users = User::where('role_id', 2)->get();

        return view('/item_edit', [
            'items' => $items,
            'categories' => $categories,
            'units' => $units,
            'users' => $users,
        ]);
    }

    public function update(Request $request, $slug)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            Validator::make($request->all(), [
                'name' => 'required',
                'brand' => 'required',
            ])->validate();

            $items = Items::where('slug', $slug)->first();
            $items->slug = null;

            if($request->hasFile('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $newName = $request->name.'-'.now()->timestamp.'.'.$extension;

                Storage::delete('photo/'.$items->photo);

                $request->file('image')->storeAs('photo', $newName);
                $request['photo'] = $newName;
                $items->photo = $newName;
            }

            $items->update($request->all());
            $items->category_id = $request->input('categories');
            $items->unit_id = $request->input('units');
            $items->user_id = $request->input('users');
            $items->status = $request->input('status');
            $items->update();

            if ($request->input('stock', 0) == 0) {
                $items->status = 'not_available';
            } else {
                $items->status = $request->input('status');
            }

            $items->update();

            return redirect('/items')->with('success', 'Item Updated Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function delete($slug)
    {
        $items = Items::where('slug', $slug)->first();

        return view('/item_delete', [
            'items' => $items,
        ]);
    }

    public function destroy($slug)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            $items = Items::where('slug', $slug)->first();
            $items->delete();
            return redirect('/items')->with('success', 'Item Deleted Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function deleteditems()
    {
        $deleteditems = Items::onlyTrashed()->get();
        return view('/item_deleted_list', [
            'deleteditems' => $deleteditems
        ]);
    }

    public function restore($slug)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            $items = Items::withTrashed()->where('slug',$slug)->first();
            $items->restore();
            return back()->with('success', 'Item Restored Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }
}
