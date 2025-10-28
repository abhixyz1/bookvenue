<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MalangVenue</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:300,400,500,600,700|raleway:200,300,400,500,600,700,800" rel="stylesheet" />
    <style>
        :root {
            --primary-dark: #0a0e27;
            --primary-navy: #162447;
            --accent-gold: #c9a961;
            --light-cream: #f5f1e8;
            --pure-white: #ffffff;
            --success-green: #16a34a;
            --warning-yellow: #eab308;
            --error-red: #dc2626;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: var(--light-cream);
            color: var(--primary-dark);
        }

        /* Header */
        .header {
            background: var(--pure-white);
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 0;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            text-decoration: none;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--accent-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .btn-logout {
            padding: 0.5rem 1.5rem;
            background: var(--error-red);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #b91c1c;
        }

        /* Main Content */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1.05rem;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: var(--pure-white);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--accent-gold);
        }

        .stat-label {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        /* Action Section */
        .action-section {
            background: var(--pure-white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .btn-primary {
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #be9981 100%);
            color: var(--primary-dark);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(201, 169, 97, 0.3);
        }

        /* Bookings Table */
        .bookings-section {
            background: var(--pure-white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: var(--light-cream);
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
        }

        .status-badge {
            padding: 0.375rem 0.875rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-approved {
            background: #d1fae5;
            color: #065f46;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #9ca3af;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            text-decoration: none;
            color: var(--primary-dark);
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: var(--accent-gold);
            border-color: var(--accent-gold);
            color: white;
        }

        .pagination .active {
            background: var(--accent-gold);
            border-color: var(--accent-gold);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="/" class="logo">MalangVenue</a>
            <div class="header-nav">
                <div class="user-info">
                    <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <span>{{ $user->name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <div class="page-header">
            <h1 class="page-title">Welcome back, {{ explode(' ', $user->name)[0] }}!</h1>
            <p class="page-subtitle">Manage your venue bookings and reservations</p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Bookings</div>
                <div class="stat-value">{{ $stats['total_bookings'] }}</div>
            </div>
            <div class="stat-card" style="border-left-color: var(--warning-yellow);">
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $stats['pending_bookings'] }}</div>
            </div>
            <div class="stat-card" style="border-left-color: var(--success-green);">
                <div class="stat-label">Approved</div>
                <div class="stat-value">{{ $stats['approved_bookings'] }}</div>
            </div>
            <div class="stat-card" style="border-left-color: var(--error-red);">
                <div class="stat-label">Rejected</div>
                <div class="stat-value">{{ $stats['rejected_bookings'] }}</div>
            </div>
        </div>

        <!-- Quick Action -->
        <div class="action-section">
            <h2 style="font-family: 'Cormorant Garamond', serif; margin-bottom: 1rem;">Ready to Book a Venue?</h2>
            <p style="color: #6b7280; margin-bottom: 1.5rem;">Browse our premium spaces and create your reservation</p>
            <a href="{{ route('booking.create') }}" class="btn-primary">+ New Booking</a>
        </div>

        <!-- Bookings List -->
        <div class="bookings-section">
            <h2 class="section-title">My Bookings</h2>
            
            @if($bookings->count() > 0)
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Room</th>
                                <th>Floor</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Duration</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td><strong>{{ $booking->room->name }}</strong></td>
                                <td>{{ $booking->room->floor->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</td>
                                <td>{{ $booking->duration }} {{ $booking->duration_unit }}</td>
                                <td><strong>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</strong></td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    {{ $bookings->links() }}
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">📅</div>
                    <h3>No bookings yet</h3>
                    <p>Start by creating your first venue reservation</p>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
