<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ClientBookingController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan user yang sedang login
        $users = Auth::user();

        // Mengambil query builder untuk bookings
        $query = Bookings::with(['items.users', 'items.units'])->where('user_id', $users->id);

        // Jika terdapat parameter status pada URL, tambahkan kondisi pencarian berdasarkan status
        if ($request->has('status')) {
            $status = $request->input('status');
            $query->where('status', $status);
        }

        // Eksekusi query builder dengan paginasi 8 data per halaman
        $bookings = $query->latest()->paginate(8);

        return view('/bookings_client', [
            'bookings' => $bookings,
        ]);
    }

    public function show($id)
    {
        $bookings = Bookings::find($id);

        return view('/print.booking_show', [
            'bookings' => $bookings,
        ]);
    }

    public function print($id)
    {
        if (Gate::allows('manage-crud-client')) {
            // Mengambil bookings
            $bookings = Bookings::find($id);

            $pdf = Pdf::loadView('/print.booking_print', ['bookings' => $bookings]);
            return $pdf->download('confirm-booking-'.Carbon::now()->timestamp.'.pdf');
        } else {
            return redirect('/')->with('error', 'Unauthorized access');
        }
    }
}
