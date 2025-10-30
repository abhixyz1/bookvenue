@extends('layouts.app')

@section('title', 'Manage Bookings')

@section('page-title', 'Manage Bookings')

@section('sidebar')
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
            <span class="sidebar-icon">📊</span>
            <span>Dashboard</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.bookings') }}" class="sidebar-link active">
            <span class="sidebar-icon">📋</span>
            <span>Bookings</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.rooms') }}" class="sidebar-link">
            <span class="sidebar-icon">🏛️</span>
            <span>Rooms</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.users') }}" class="sidebar-link">
            <span class="sidebar-icon">👥</span>
            <span>Users</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ url('/') }}" class="sidebar-link">
            <span class="sidebar-icon">🏠</span>
            <span>Back to Home</span>
        </a>
    </div>
@endsection

@section('content')
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--gray-900);">
                        Booking Management 📋
                    </h2>
                    <p style="color: var(--gray-600);">
                        Review and manage all venue booking requests.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Venue</th>
                            <th>Event</th>
                            <th>Date & Time</th>
                            <th>Guests</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td><strong>#{{ $booking->id }}</strong></td>
                                <td>
                                    <div>{{ $booking->user->name }}</div>
                                    <small style="color: var(--gray-500);">{{ $booking->user->email }}</small>
                                </td>
                                <td>
                                    <div><strong>{{ $booking->room->name }}</strong></div>
                                    <small style="color: var(--gray-500);">Floor {{ $booking->room->floor->number }}</small>
                                </td>
                                <td>
                                    <div style="max-width: 200px;">
                                        <strong>{{ $booking->event_name ?? $booking->purpose ?? 'N/A' }}</strong>
                                        @if($booking->description)
                                            <small style="display: block; color: var(--gray-500); margin-top: 0.25rem;">
                                                {{ Str::limit($booking->description, 50) }}
                                            </small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div style="font-size: 0.875rem;">
                                        <div>{{ ($booking->start_datetime ?? $booking->start_date)->format('d M Y') }}</div>
                                        <div style="color: var(--gray-500);">
                                            {{ ($booking->start_datetime ?? $booking->start_date)->format('H:i') }} -
                                            {{ ($booking->end_datetime ?? $booking->end_date)->format('H:i') }}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $booking->number_of_guests ?? '-' }}</td>
                                <td><strong style="color: var(--accent);">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong></td>
                                <td>
                                    <span class="badge badge-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        @if($booking->status === 'pending')
                                            <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn-sm btn-success" onclick="return confirm('Approve this booking?')">
                                                    ✓
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Reject this booking?')">
                                                    ✗
                                                </button>
                                            </form>
                                        @endif
                                        <button class="btn-sm btn-info" onclick="viewDetails({{ $booking->id }})">
                                            👁️
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" style="text-align: center; padding: 3rem; color: var(--gray-500);">
                                    No bookings found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($bookings->hasPages())
        <div style="margin-top: 2rem;">
            {{ $bookings->links() }}
        </div>
    @endif

    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background: var(--gray-50);
        }

        .table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--gray-700);
            border-bottom: 2px solid var(--gray-200);
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-200);
            font-size: 0.875rem;
        }

        .table tbody tr:hover {
            background: var(--gray-50);
        }

        .badge {
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-approved { background: #d1fae5; color: #065f46; }
        .badge-rejected { background: #fee2e2; color: #991b1b; }
        .badge-cancelled { background: #e5e7eb; color: #374151; }

        .btn-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.813rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        .btn-info {
            background: var(--info);
            color: white;
        }

        .btn-info:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }
    </style>

    <script>
        function viewDetails(bookingId) {
            alert('Booking details #' + bookingId + '\n\nDetailed view will be implemented soon.');
        }
    </script>
@endsection
