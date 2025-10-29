<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Room;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user dashboard
     */
    public function index()
    {
        $user = Auth::user();

        $bookings = Booking::where('user_id', $user->id)
            ->with(['room.floor'])
            ->latest()
            ->paginate(10);

        $stats = [
            'total_bookings' => Booking::where('user_id', $user->id)->count(),
            'pending_bookings' => Booking::where('user_id', $user->id)->where('status', 'pending')->count(),
            'approved_bookings' => Booking::where('user_id', $user->id)->where('status', 'approved')->count(),
            'rejected_bookings' => Booking::where('user_id', $user->id)->where('status', 'rejected')->count(),
        ];

        return view('dashboard.user', compact('bookings', 'stats', 'user'));
    }

    /**
     * Show booking form
     */
    public function showBookingForm()
    {
        $rooms = Room::with('floor')->where('is_active', true)->get();
        return view('dashboard.booking-create', compact('rooms'));
    }
}
