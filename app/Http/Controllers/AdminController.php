<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use App\Models\Units;
use App\Models\Bookings;
use App\Models\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->where('role_id', '!=', 1)->get();
        $unitCount = Units::count();
        $categoryCount = Categories::count();
        $itemCount = Items::count();
        $bookingCount = Bookings::count();
        $bookings = Bookings::all();

        return view('admin_dashboard', [
            'users' => $users,
            'unit_count' => $unitCount,
            'category_count' => $categoryCount,
            'item_count' => $itemCount,
            'booking_count' => $bookingCount,
            'bookings' => $bookings,
        ]);
    }
}
