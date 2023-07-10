<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Bookings::with(['items.users', 'items.units'])->get();
        return view('/bookings', [
            'bookings' => $bookings,
        ]);
    }


    public function approvebookings($id)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            $bookings = Bookings::findOrFail($id);
            if ($bookings->status === 'approved') {
                return redirect('/bookings')->with('error', 'Booking already approved');
            } else {
                $items = Items::findOrFail($bookings->item_id);

                if ($items->stock < $bookings->stock) {
                    return redirect()->back()->with('error', 'Not enough items in stock.');
                }

                $items->stock -= $bookings->stock;
                $items->save();

                if ($items->stock == 0) {
                    $items->status = 'used';
                    $items->save();
                }

                if ($items->stock < 0) {
                    return redirect()->back()->with('error', 'Not enough items in stock.');
                }

                $bookings->status = 'approved';
                $bookings->save();

                if($bookings->save()){
                    return redirect('/bookings')->with('success', 'Booking approved successfully.');
                }
            }
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function rejectbookings($id)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            $bookings = Bookings::findOrFail($id);
            if ($bookings->status !== 'waiting') {
                return redirect()->back()->with('error', 'Cannot approve a booking that is not waiting.');
            }

            $bookings->status = 'rejected';
            $bookings->save();

            return redirect('/bookings')->with('success', 'Success Change Status');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function confirmbookings($id)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            $bookings = Bookings::findOrFail($id);
            $bookings->confirm_return_date = Carbon::now()->toDateString();

            if ($bookings->confirm_return_date > $bookings->return_date) {
                $bookings->status = 'done_late';
            }

            if ($bookings->confirm_return_date < $bookings->return_date) {
                $bookings->status = 'done';
            }

            $bookings->save();

            $items = Items::findOrFail($bookings->item_id);
            $items->stock += $bookings->stock;
            $items->status = 'available';
            $items->save();

            return redirect('/bookings')->with('success', 'Success Change Status');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function cancelbyadmin($id)
    {
        if (Gate::allows('manage-crud-admin-adminunit')) {
            $bookings = Bookings::findOrFail($id);
            $bookings->status = 'canceled';
            $bookings->save();

            return redirect('/bookings')->with('success', 'Success Change Status');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function cancelbookings($id)
    {
        if (Gate::allows('manage-crud-client')) {
            $bookings = Bookings::findOrFail($id);
            $bookings->status = 'canceled';
            $bookings->save();

            return redirect('/bookings_client')->with('success', 'Success Change Status');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }

    public function ongoingbookings()
    {
        $today = Carbon::today()->toDateString();

        $bookings = Bookings::where('status', 'approved')->where('booking_date', '<=', $today)->get();

        foreach ($bookings as $booking) {
            $booking->status = 'on_going';
            $booking->save();
        }

        return response()->json(['message' => 'Bookings updated successfully.']);
    }
}
