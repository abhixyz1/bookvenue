<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::with('floor');

        // Filter by type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Filter by capacity (minimum)
        if ($request->has('capacity')) {
            $query->where('capacity', '>=', $request->capacity);
        }

        // Filter by floor
        if ($request->has('floor_id')) {
            $query->where('floor_id', $request->floor_id);
        }

        // Filter by price range
        if ($request->has('max_price_hour')) {
            $query->where('price_hour', '<=', $request->max_price_hour);
        }

        // Search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json([
            'data' => $query->paginate(15)
        ]);
    }

    public function show(Room $room)
    {
        return response()->json([
            'data' => $room->load('floor')
        ]);
    }

    public function checkAvailability(Request $request, Room $room)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $conflictBookings = Booking::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->where('status', '!=', 'rejected')
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('start_date', '<=', $request->start_date)
                          ->where('end_date', '>=', $request->end_date);
                    });
            })
            ->exists();

        return response()->json([
            'available' => !$conflictBookings,
            'room' => $room->name,
            'period' => [
                'start' => $request->start_date,
                'end' => $request->end_date,
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'floor_id' => 'required|exists:floors,id',
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'type' => 'required|in:meeting,hall,auditorium,lab',
            'facilities' => 'nullable|array',
            'price_hour' => 'required|numeric|min:0',
            'price_day' => 'required|numeric|min:0',
        ]);

        $room = Room::create($validated);

        return response()->json([
            'message' => 'Room created successfully',
            'data' => $room->load('floor')
        ], 201);
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'floor_id' => 'sometimes|exists:floors,id',
            'name' => 'sometimes|string|max:255',
            'capacity' => 'sometimes|integer|min:1',
            'type' => 'sometimes|in:meeting,hall,auditorium,lab',
            'facilities' => 'nullable|array',
            'price_hour' => 'sometimes|numeric|min:0',
            'price_day' => 'sometimes|numeric|min:0',
        ]);

        $room->update($validated);

        return response()->json([
            'message' => 'Room updated successfully',
            'data' => $room->load('floor')
        ]);
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json([
            'message' => 'Room deleted successfully'
        ]);
    }
}
