<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use App\Models\Lists;
use App\Models\Units;
use App\Models\Bookings;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        // Mendapatkan user yang sedang login
        $users = Auth::user();
        // Mengambil bookings
        $bookings = Bookings::with(['items.users', 'items.units'])->where('user_id', $users->id)->get();

        $bookingsCount = Bookings::with(['items.users', 'items.units'])->where('user_id', $users->id)->count();
        $bookingsApprovedCount = Bookings::where('user_id', $users->id)->whereIn('status', ['approved'])->count();
        $bookingsFailedCount = Bookings::where('user_id', $users->id)
        ->where(function ($query) {
            $query->where('status', 'canceled')
                ->orWhere('status', 'rejected');
        })
        ->count();
        $itemCount = Items::count();


        return view('dashboard', [
            'item_count' => $itemCount,
            'bookings_count' => $bookingsCount,
            'approved_bookings_count' => $bookingsApprovedCount,
            'failed_bookings_count' => $bookingsFailedCount,
            'bookings' => $bookings,
        ]);
    }
}
