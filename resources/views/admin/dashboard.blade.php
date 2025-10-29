@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('page-title', 'Admin Dashboard')

@section('sidebar')
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link active">
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
    <!-- Welcome Section -->
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-body">
            <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--gray-900);">
                Admin Dashboard 🎯
            </h2>
            <p style="color: var(--gray-600);">
                Overview of your venue management system and booking analytics.
            </p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['total_bookings'] }}</div>
                    <div class="stat-label">Total Bookings</div>
                </div>
                <div class="stat-icon primary">📊</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['pending_bookings'] }}</div>
                    <div class="stat-label">Pending Review</div>
                </div>
                <div class="stat-icon warning">⏳</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['total_users'] }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-icon accent">👥</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['active_rooms'] }}/{{ $stats['total_rooms'] }}</div>
                    <div class="stat-label">Active Rooms</div>
                </div>
                <div class="stat-icon success">🏛️</div>
            </div>
        </div>
    </div>

    <!-- Revenue Card -->
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3 style="font-size: 0.875rem; color: var(--gray-600); margin-bottom: 0.5rem; font-weight: 600;">Total Revenue (Approved)</h3>
                    <div style="font-size: 2.5rem; font-weight: 700; color: var(--accent);">
                        Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}
                    </div>
                </div>
                <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(212, 175, 55, 0.1); display: flex; align-items: center; justify-content: center; font-size: 2.5rem;">
                    💰
                </div>
            </div>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
        <!-- Recent Bookings -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Recent Bookings</h2>
                <a href="{{ route('admin.bookings') }}" class="btn btn-sm btn-outline">View All</a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Room</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_bookings as $booking)
                        <tr>
                            <td>
                                <div style="font-weight: 600; font-size: 0.875rem;">{{ $booking->user->name }}</div>
                                <div style="font-size: 0.75rem; color: var(--gray-500);">{{ $booking->user->email }}</div>
                            </td>
                            <td>
                                <div style="font-weight: 500; font-size: 0.875rem;">{{ $booking->room->name }}</div>
                                <div style="font-size: 0.75rem; color: var(--gray-500);">Floor {{ $booking->room->floor->number }}</div>
                            </td>
                            <td style="font-size: 0.875rem;">{{ $booking->booking_date->format('d M Y') }}</td>
                            <td>
                                <span class="badge badge-{{ $booking->status }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state" style="padding: 2rem;">
                                    <div class="empty-state-icon" style="font-size: 2rem;">📋</div>
                                    <p style="font-size: 0.875rem;">No bookings yet</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Popular Rooms -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Popular Rooms</h2>
                <a href="{{ route('admin.rooms') }}" class="btn btn-sm btn-outline">View All</a>
            </div>

            <div class="card-body">
                @forelse($popular_rooms as $room)
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid var(--gray-200);">
                    <div>
                        <div style="font-weight: 600; margin-bottom: 0.25rem;">{{ $room->name }}</div>
                        <div style="font-size: 0.813rem; color: var(--gray-500);">
                            Floor {{ $room->floor->number }} • {{ ucfirst($room->type) }}
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <div style="font-size: 1.5rem; font-weight: 700; color: var(--accent);">{{ $room->bookings_count }}</div>
                        <div style="font-size: 0.75rem; color: var(--gray-500);">bookings</div>
                    </div>
                </div>
                @empty
                <div class="empty-state" style="padding: 2rem;">
                    <div class="empty-state-icon" style="font-size: 2rem;">🏛️</div>
                    <p style="font-size: 0.875rem;">No room data available</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Quick Actions</h2>
        </div>
        <div class="card-body">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <a href="{{ route('admin.bookings') }}" class="btn btn-outline" style="justify-content: center;">
                    <span>📋</span>
                    <span>Manage Bookings</span>
                </a>
                <a href="{{ route('admin.rooms') }}" class="btn btn-outline" style="justify-content: center;">
                    <span>🏛️</span>
                    <span>Manage Rooms</span>
                </a>
                <a href="{{ route('admin.users') }}" class="btn btn-outline" style="justify-content: center;">
                    <span>👥</span>
                    <span>Manage Users</span>
                </a>
                <a href="/api/documentation" class="btn btn-outline" style="justify-content: center;">
                    <span>📚</span>
                    <span>API Documentation</span>
                </a>
            </div>
        </div>
    </div>
@endsection
