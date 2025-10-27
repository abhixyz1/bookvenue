<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    // User's bookings
    public function index(Request $request)
    {
        $bookings = Booking::with(['room.floor', 'user'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return response()->json([
            'data' => $bookings
        ]);
    }

    // Admin view all bookings
    public function adminIndex(Request $request)
    {
        $query = Booking::with(['room.floor', 'user']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('room_id')) {
            $query->where('room_id', $request->room_id);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(15);

        return response()->json([
            'data' => $bookings
        ]);
    }

    public function show(Booking $booking)
    {
        // Check if user owns this booking or is admin
        if ($booking->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json([
            'data' => $booking->load(['room.floor', 'user'])
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'purpose' => 'required|string|max:500',
            'booking_type' => 'required|in:hourly,daily',
        ]);

        $room = Room::findOrFail($validated['room_id']);

        // Check availability
        $conflictBookings = Booking::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($validated) {
                $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhere(function ($q) use ($validated) {
                        $q->where('start_date', '<=', $validated['start_date'])
                          ->where('end_date', '>=', $validated['end_date']);
                    });
            })
            ->exists();

        if ($conflictBookings) {
            return response()->json([
                'message' => 'Room is not available for the selected dates'
            ], 422);
        }

        // Calculate total price
        $start = Carbon::parse($validated['start_date']);
        $end = Carbon::parse($validated['end_date']);

        if ($validated['booking_type'] === 'hourly') {
            $hours = $start->diffInHours($end);
            $totalPrice = $hours * $room->price_hour;
        } else {
            $days = $start->diffInDays($end);
            $totalPrice = $days * $room->price_day;
        }

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'room_id' => $room->id,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'purpose' => $validated['purpose'],
            'booking_type' => $validated['booking_type'],
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Booking created successfully. Waiting for admin approval.',
            'data' => $booking->load(['room.floor'])
        ], 201);
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        if (!in_array($booking->status, ['pending', 'approved'])) {
            return response()->json([
                'message' => 'Cannot cancel this booking'
            ], 422);
        }

        $booking->update(['status' => 'cancelled']);

        return response()->json([
            'message' => 'Booking cancelled successfully',
            'data' => $booking
        ]);
    }

    public function approve(Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return response()->json([
                'message' => 'Only pending bookings can be approved'
            ], 422);
        }

        $booking->update(['status' => 'approved']);

        return response()->json([
            'message' => 'Booking approved successfully',
            'data' => $booking->load(['room.floor', 'user'])
        ]);
    }

    public function reject(Request $request, Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return response()->json([
                'message' => 'Only pending bookings can be rejected'
            ], 422);
        }

        $booking->update([
            'status' => 'rejected',
            'notes' => $request->input('reason', null)
        ]);

        return response()->json([
            'message' => 'Booking rejected',
            'data' => $booking->load(['room.floor', 'user'])
        ]);
    }
}
