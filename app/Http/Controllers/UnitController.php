<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function index()
    {
        $units = Units::all();
        return view('/units', [
            'units' => $units
        ]);
    }

    public function add()
    {
        return view('/unit_add');
    }

    public function store(Request $request)
    {
        if (Gate::allows('manage-crud-admin')) {
            Validator::make($request->all(), [
                'name' => 'required|unique:units',
                'unit_address' => 'required'
            ])->validate();

            Units::create($request->all());
            return redirect('/units')->with('success', 'Unit Added Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function edit($slug)
    {
        $units = Units::where('slug', $slug)->first();
        return view('/unit_edit', [
            'units' => $units
        ]);
    }

    public function update(Request $request, $slug)
    {
        if (Gate::allows('manage-crud-admin')) {
            Validator::make($request->all(), [
                'name' => 'required|unique:units',
                'unit_address' => 'required'
            ])->validate();

            $units = Units::where('slug', $slug)->first();
            $units->slug = null;
            $units->update($request->all());

            return redirect('/units')->with('success', 'Unit Updated Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function delete($slug)
    {
        $units = Units::where('slug',$slug)->first();
        return view('/unit_delete', [
            'units' => $units
        ]);
    }

    public function destroy($slug)
    {
        if (Gate::allows('manage-crud-admin')) {
            $units = Units::where('slug',$slug)->first();
            $units->delete();

            return redirect('/units')->with('success', 'Unit Deleted Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function deleted_units()
    {
        $deletedunits = Units::onlyTrashed()->get();
        return view('/unit_deleted_list', [
            'deletedunits' => $deletedunits
        ]);
    }

    public function restore($slug)
    {
        if (Gate::allows('manage-crud-admin')) {
            $units = Units::withTrashed()->where('slug',$slug)->first();
            $units->restore();
            return back()->with('success', 'Unit Restored Successfully');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }
}
