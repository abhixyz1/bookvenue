@extends('layouts.app')

@section('title', 'Manage Users')

@section('page-title', 'Manage Users')

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
        <a href="{{ route('admin.rooms') }}" class="sidebar-link">
            <span class="sidebar-icon">🏛️</span>
            <span>Rooms</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('admin.users') }}" class="sidebar-link active">
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
                User Management 👥
            </h2>
            <p style="color: var(--gray-600);">
                Manage all registered users and their access.
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>Total Bookings</th>
                            <th>Registered</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td><strong>#{{ $user->id }}</strong></td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.75rem;">
                                        <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--accent); display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--primary);">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong>{{ $user->name }}</strong>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge badge-{{ $user->role === 'admin' ? 'admin' : 'user' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <strong>{{ $user->bookings_count ?? 0 }}</strong> bookings
                                </td>
                                <td>
                                    <div style="font-size: 0.875rem; color: var(--gray-600);">
                                        {{ $user->created_at->format('d M Y') }}
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-approved">Active</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 3rem; color: var(--gray-500);">
                                    No users found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($users->hasPages())
        <div style="margin-top: 2rem;">
            {{ $users->links() }}
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
        .badge-admin { background: #dbeafe; color: #1e40af; }
        .badge-user { background: #e0e7ff; color: #4338ca; }
        .badge-approved { background: #d1fae5; color: #065f46; }
    </style>
@endsection
