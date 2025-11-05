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
        $rooms = \App\Models\Room::with('floor')->get();
        return view('dashboard.booking-create', compact('rooms'));
    }

    /**
     * Store a new booking
     */
    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_date' => 'required|date|after_or_equal:start_date',
            'end_time' => 'required',
            'event_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        // Get room to calculate price
        $room = Room::findOrFail($validated['room_id']);

        // Calculate duration and price
        $start = new \DateTime($validated['start_date'] . ' ' . $validated['start_time']);
        $end = new \DateTime($validated['end_date'] . ' ' . $validated['end_time']);
        $interval = $start->diff($end);

        $totalHours = ($interval->days * 24) + $interval->h + ($interval->i / 60);
        $totalDays = ceil($totalHours / 24);

        // Use daily rate if booking is more than 8 hours, otherwise hourly
        if ($totalHours >= 8) {
            $totalPrice = $totalDays * $room->price_day;
        } else {
            $totalPrice = ceil($totalHours) * $room->price_hour;
        }

        // Check for conflicts
        $hasConflict = Booking::where('room_id', $validated['room_id'])
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('start_datetime', [$start, $end])
                    ->orWhereBetween('end_datetime', [$start, $end])
                    ->orWhere(function ($q) use ($start, $end) {
                        $q->where('start_datetime', '<=', $start)
                          ->where('end_datetime', '>=', $end);
                    });
            })
            ->exists();

        if ($hasConflict) {
            return back()->withErrors([
                'room_id' => 'This venue is already booked for the selected time period. Please choose a different date or venue.'
            ])->withInput();
        }

        // Create booking
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $validated['room_id'],
            'start_datetime' => $start,
            'end_datetime' => $end,
            'event_name' => $validated['event_name'],
            'description' => $validated['description'],
            'number_of_guests' => $validated['number_of_guests'],
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking request submitted successfully! Waiting for admin approval.');
    }
}
