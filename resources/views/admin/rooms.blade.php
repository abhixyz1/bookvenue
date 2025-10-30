@extends('layouts.app')

@section('title', 'Manage Rooms')

@section('page-title', 'Manage Rooms')

@section('sidebar')
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
            <span class="sidebar-icon">📊</span>
            <span>Dashboard</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.bookings') }}" class="sidebar-link">
            <span class="sidebar-icon">📋</span>
            <span>Bookings</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.rooms') }}" class="sidebar-link active">
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
            <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--gray-900);">
                Room Management 🏛️
            </h2>
            <p style="color: var(--gray-600);">
                Manage all venue rooms and facilities.
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-body" style="padding: 0;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Floor</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Price (Hour)</th>
                            <th>Price (Day)</th>
                            <th>Facilities</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $room)
                            <tr>
                                <td><strong>#{{ $room->id }}</strong></td>
                                <td><strong>{{ $room->name }}</strong></td>
                                <td>Floor {{ $room->floor->number }}</td>
                                <td><span style="text-transform: capitalize;">{{ $room->type }}</span></td>
                                <td>{{ $room->capacity }} pax</td>
                                <td><strong style="color: var(--accent);">Rp {{ number_format($room->price_hour, 0, ',', '.') }}</strong></td>
                                <td><strong style="color: var(--accent);">Rp {{ number_format($room->price_day, 0, ',', '.') }}</strong></td>
                                <td>
                                    <div style="display: flex; flex-wrap: wrap; gap: 0.25rem;">
                                        @foreach($room->facilities as $facility)
                                            <span class="facility-badge">{{ $facility }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $room->is_active ? 'approved' : 'rejected' }}">
                                        {{ $room->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" style="text-align: center; padding: 3rem; color: var(--gray-500);">
                                    No rooms found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($rooms->hasPages())
        <div style="margin-top: 2rem;">
            {{ $rooms->links() }}
        </div>
    @endif

    <style>
        .table-responsive { overflow-x: auto; }
        .table { width: 100%; border-collapse: collapse; }
        .table thead { background: var(--gray-50); }
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
        .table tbody tr:hover { background: var(--gray-50); }

        .badge {
            padding: 0.35rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-approved { background: #d1fae5; color: #065f46; }
        .badge-rejected { background: #fee2e2; color: #991b1b; }

        .facility-badge {
            padding: 0.25rem 0.5rem;
            background: var(--gray-100);
            color: var(--gray-700);
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
    </style>
@endsection
