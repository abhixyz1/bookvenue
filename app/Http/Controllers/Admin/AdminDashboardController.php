<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Floor;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the admin dashboard
     */
    public function index()
    {
        $stats = [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'approved_bookings' => Booking::where('status', 'approved')->count(),
            'total_users' => User::where('role', 'user')->count(),
            'total_rooms' => Room::count(),
            'active_rooms' => Room::where('is_active', true)->count(),
            'total_revenue' => Booking::where('status', 'approved')->sum('total_price'),
        ];

        $recent_bookings = Booking::with(['user', 'room.floor'])
            ->latest()
            ->take(10)
            ->get();

        $popular_rooms = Room::withCount(['bookings' => function($query) {
            $query->where('status', 'approved');
        }])
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_bookings', 'popular_rooms'));
    }

    /**
     * Show all bookings
     */
    public function bookings()
    {
        $bookings = Booking::with(['user', 'room.floor'])
            ->latest()
            ->paginate(20);

        return view('admin.bookings', compact('bookings'));
    }

    /**
     * Show all rooms
     */
    public function rooms()
    {
        $rooms = Room::with('floor')->paginate(20);
        return view('admin.rooms', compact('rooms'));
    }

    /**
     * Show all users
     */
    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }
}
