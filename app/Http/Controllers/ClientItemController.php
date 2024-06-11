<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Bookings;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ClientItemController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categories::all();

        if ($request->categories || $request->search || $request->status) {
            $items = Items::where(function ($query) use ($request) {
                $status = $request->query('status');

                if ($request->categories) {
                    $query->whereHas('categories', function ($q) use ($request) {
                        $q->where('categories.id', 'LIKE', '%' . $request->categories . '%');
                    });
                }

                if ($request->search) {
                    $query->orWhere('name', 'LIKE', '%' . $request->search . '%');
                    $query->orWhere('brand', 'LIKE', '%' . $request->search . '%');
                    $query->orWhere('description', 'LIKE', '%' . $request->search . '%');
                }

                if ($request->status) {
                    $query->orWhere('status', $status)->get();
                }
            })->paginate(6);
        } else {
            $items = Items::paginate(6);
        }
        return view('/item_list', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    public function book($slug)
    {
        $items = Items::where('slug', $slug)->with('units', 'users')->first();
        $users = Auth::user();
        return view('/book_item', [
            'items' => $items,
            'users' => $users,
        ]);
    }

    public function store(Request $request, $slug)
    {
        if (Gate::allows('manage-crud-client')) {
            $validate = Validator::make($request->all(), [
                'booking_date' => 'required|date',
                'return_date' => 'required|date',
                'stock' => 'required|integer|min:1',
            ])->validate();


            $items = Items::where('slug', $slug)->first();
            $users = Auth::user();

            if ($items->stock === 0) {
                return redirect()->back()->with('error','Item is out of stock.');
            }

            if ($items->stock < $validate['stock']) {
                return redirect()->back()->with('error','Requested quantity is more than available item.');
            }

            if ($request->booking_date > $request->return_date) {
                return redirect()->back()->with('error','Booking date must be before the return date.');
            }

            if($items['status'] != 'available') {
                return redirect('/item_list')->with('error', 'Error the items cant be borrowed');
            } else {
                try {
                    DB::beginTransaction();

                    $bookings = Bookings::create($request->all());
                    $bookings->user_id = $users->id;
                    $bookings->item_id = $items->id;

                    $bookings->save();

                    DB::commit();

                    return redirect('/bookings_client')->with('success', 'Successfully - Wait for The Approval');
                }
                catch(\Throwable){
                    DB::rollBack();
                }
            }
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }
}
