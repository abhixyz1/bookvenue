@extends('layouts.app')

@section('title', 'User Dashboard')

@section('page-title', 'My Dashboard')

@section('sidebar')
    <div class="sidebar-menu-item">
        <a href="{{ route('dashboard') }}" class="sidebar-link active">
            <span class="sidebar-icon">📊</span>
            <span>Dashboard</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('dashboard.booking.create') }}" class="sidebar-link">
            <span class="sidebar-icon">➕</span>
            <span>New Booking</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="#" class="sidebar-link">
            <span class="sidebar-icon">📋</span>
            <span>My Bookings</span>
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
                Welcome back, {{ $user->name }}! 👋
            </h2>
            <p style="color: var(--gray-600);">
                Here's what's happening with your venue bookings today.
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
                    <div class="stat-label">Pending</div>
                </div>
                <div class="stat-icon warning">⏳</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['approved_bookings'] }}</div>
                    <div class="stat-label">Approved</div>
                </div>
                <div class="stat-icon success">✓</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <div>
                    <div class="stat-value">{{ $stats['rejected_bookings'] }}</div>
                    <div class="stat-label">Rejected</div>
                </div>
                <div class="stat-icon danger">✕</div>
            </div>
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Your Bookings</h2>
            <a href="{{ route('dashboard.booking.create') }}" class="btn btn-accent">
                <span>➕</span>
                <span>New Booking</span>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Room</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                    <tr>
                        <td>
                            <div style="font-weight: 600; color: var(--gray-900);">{{ $booking->room->name }}</div>
                            <div style="font-size: 0.813rem; color: var(--gray-500);">Floor {{ $booking->room->floor->number }}</div>
                        </td>
                        <td>
                            <div style="font-weight: 500;">{{ $booking->booking_date->format('d M Y') }}</div>
                        </td>
                        <td>
                            <div style="font-size: 0.875rem;">{{ $booking->start_time }} - {{ $booking->end_time }}</div>
                        </td>
                        <td>
                            <div style="font-weight: 600; color: var(--accent);">
                                Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-{{ $booking->status }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-state-icon">📋</div>
                                <h3 style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--gray-700);">
                                    No bookings yet
                                </h3>
                                <p style="margin-bottom: 1.5rem;">Start by creating your first booking!</p>
                                <a href="{{ route('dashboard.booking.create') }}" class="btn btn-accent">
                                    <span>➕</span>
                                    <span>Create Booking</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($bookings->hasPages())
        <div style="padding: 1rem 1.5rem; border-top: 1px solid var(--gray-200);">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>
@endsection
