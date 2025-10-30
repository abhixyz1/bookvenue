@extends('layouts.app')

@section('title', 'Create New Booking')

@section('page-title', 'Create New Booking')

@section('sidebar')
    <div class="sidebar-menu-item">
        <a href="{{ route('dashboard') }}" class="sidebar-link">
            <span class="sidebar-icon">📊</span>
            <span>Dashboard</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('dashboard.booking.create') }}" class="sidebar-link active">
            <span class="sidebar-icon">➕</span>
            <span>New Booking</span>
        </a>
    </div>
    <div class="sidebar-menu-item">
        <a href="{{ route('dashboard') }}" class="sidebar-link">
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
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-body">
            <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--gray-900);">
                Book a Venue 🎯
            </h2>
            <p style="color: var(--gray-600);">
                Fill in the details below to create a new venue booking request.
            </p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom: 2rem;">
            <strong>⚠️ There were some errors:</strong>
            <ul style="margin: 0.5rem 0 0 1.5rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" style="margin-bottom: 2rem;">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('dashboard.booking.store') }}" method="POST" id="bookingForm">
                @csrf
                
                <!-- Room Selection -->
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="room_id" class="form-label">Select Venue *</label>
                    <select name="room_id" id="room_id" class="form-control" required>
                        <option value="">-- Choose a venue --</option>
                        @foreach($rooms->groupBy('floor.number') as $floorNumber => $floorRooms)
                            <optgroup label="Floor {{ $floorNumber }}">
                                @foreach($floorRooms as $room)
                                    <option value="{{ $room->id }}" 
                                            data-capacity="{{ $room->capacity }}"
                                            data-type="{{ $room->type }}"
                                            data-price-hour="{{ $room->price_hour }}"
                                            data-price-day="{{ $room->price_day }}"
                                            data-facilities="{{ json_encode($room->facilities) }}">
                                        {{ $room->name }} - {{ ucfirst($room->type) }} ({{ $room->capacity }} pax)
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <!-- Room Details (Dynamic) -->
                <div id="roomDetails" style="display: none; margin-bottom: 2rem; padding: 1rem; background: var(--gray-50); border-radius: 8px;">
                    <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 0.75rem; color: var(--gray-900);">Venue Details</h4>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <div>
                            <span style="color: var(--gray-600); font-size: 0.875rem;">Capacity:</span>
                            <strong id="roomCapacity" style="display: block; color: var(--gray-900);">-</strong>
                        </div>
                        <div>
                            <span style="color: var(--gray-600); font-size: 0.875rem;">Type:</span>
                            <strong id="roomType" style="display: block; color: var(--gray-900); text-transform: capitalize;">-</strong>
                        </div>
                        <div>
                            <span style="color: var(--gray-600); font-size: 0.875rem;">Price (Hourly):</span>
                            <strong id="roomPriceHour" style="display: block; color: var(--accent);">-</strong>
                        </div>
                        <div>
                            <span style="color: var(--gray-600); font-size: 0.875rem;">Price (Daily):</span>
                            <strong id="roomPriceDay" style="display: block; color: var(--accent);">-</strong>
                        </div>
                    </div>
                    <div style="margin-top: 0.75rem;">
                        <span style="color: var(--gray-600); font-size: 0.875rem;">Facilities:</span>
                        <div id="roomFacilities" style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 0.5rem;"></div>
                    </div>
                </div>

                <!-- Date and Time -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div class="form-group">
                        <label for="start_date" class="form-label">Start Date *</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="start_time" class="form-label">Start Time *</label>
                        <input type="time" name="start_time" id="start_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="form-label">End Date *</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="end_time" class="form-label">End Time *</label>
                        <input type="time" name="end_time" id="end_time" class="form-control" required>
                    </div>
                </div>

                <!-- Event Details -->
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="event_name" class="form-label">Event Name *</label>
                    <input type="text" name="event_name" id="event_name" class="form-control" placeholder="e.g., Annual Company Meeting" required>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="description" class="form-label">Event Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="Provide additional details about your event..."></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="number_of_guests" class="form-label">Number of Guests *</label>
                    <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" min="1" placeholder="Expected number of attendees" required>
                    <small id="capacityWarning" style="display: none; color: var(--danger); margin-top: 0.5rem;"></small>
                </div>

                <!-- Price Calculation -->
                <div style="background: var(--gray-50); padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
                    <h4 style="font-size: 1rem; font-weight: 600; margin-bottom: 1rem; color: var(--gray-900);">Price Calculation</h4>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; background: var(--white); border-radius: 6px; border: 2px solid var(--accent);">
                        <span style="font-size: 1.125rem; color: var(--gray-700);">Estimated Total:</span>
                        <span id="totalPrice" style="font-size: 1.75rem; font-weight: 700; color: var(--accent);">Rp 0</span>
                    </div>
                    <p style="margin-top: 0.75rem; font-size: 0.875rem; color: var(--gray-600);">
                        💡 Price will be calculated based on duration and venue rate. Final confirmation from admin required.
                    </p>
                </div>

                <!-- Submit Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <span>Submit Booking Request</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--gray-300);
            border-radius: 6px;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: var(--white);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .alert {
            padding: 1rem 1.25rem;
            border-radius: 8px;
            border-left: 4px solid;
        }

        .alert-danger {
            background: #fef2f2;
            border-color: var(--danger);
            color: #991b1b;
        }

        .alert-success {
            background: #f0fdf4;
            border-color: var(--success);
            color: #166534;
        }

        .facility-badge {
            padding: 0.35rem 0.875rem;
            background: var(--white);
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roomSelect = document.getElementById('room_id');
            const roomDetails = document.getElementById('roomDetails');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const startTimeInput = document.getElementById('start_time');
            const endTimeInput = document.getElementById('end_time');
            const guestsInput = document.getElementById('number_of_guests');

            // Update room details when room is selected
            roomSelect.addEventListener('change', function() {
                const option = this.options[this.selectedIndex];
                if (this.value) {
                    const capacity = option.getAttribute('data-capacity');
                    const type = option.getAttribute('data-type');
                    const priceHour = parseInt(option.getAttribute('data-price-hour'));
                    const priceDay = parseInt(option.getAttribute('data-price-day'));
                    const facilities = JSON.parse(option.getAttribute('data-facilities') || '[]');

                    document.getElementById('roomCapacity').textContent = capacity + ' guests';
                    document.getElementById('roomType').textContent = type;
                    document.getElementById('roomPriceHour').textContent = 'Rp ' + priceHour.toLocaleString('id-ID');
                    document.getElementById('roomPriceDay').textContent = 'Rp ' + priceDay.toLocaleString('id-ID');

                    const facilitiesContainer = document.getElementById('roomFacilities');
                    facilitiesContainer.innerHTML = '';
                    facilities.forEach(facility => {
                        const badge = document.createElement('span');
                        badge.className = 'facility-badge';
                        badge.textContent = facility;
                        facilitiesContainer.appendChild(badge);
                    });

                    roomDetails.style.display = 'block';
                    calculatePrice();
                } else {
                    roomDetails.style.display = 'none';
                }
            });

            // Validate end date
            startDateInput.addEventListener('change', function() {
                endDateInput.min = this.value;
                if (endDateInput.value && endDateInput.value < this.value) {
                    endDateInput.value = this.value;
                }
                calculatePrice();
            });

            // Calculate price when dates/times change
            [startDateInput, endDateInput, startTimeInput, endTimeInput].forEach(input => {
                input.addEventListener('change', calculatePrice);
            });

            // Check capacity
            guestsInput.addEventListener('input', function() {
                const option = roomSelect.options[roomSelect.selectedIndex];
                if (roomSelect.value && option) {
                    const capacity = parseInt(option.getAttribute('data-capacity'));
                    const guests = parseInt(this.value);
                    const warning = document.getElementById('capacityWarning');

                    if (guests > capacity) {
                        warning.textContent = `⚠️ Warning: Guest count exceeds venue capacity (${capacity} max)`;
                        warning.style.display = 'block';
                    } else {
                        warning.style.display = 'none';
                    }
                }
            });

            function calculatePrice() {
                const option = roomSelect.options[roomSelect.selectedIndex];
                if (!roomSelect.value || !startDateInput.value || !endDateInput.value) {
                    return;
                }

                const priceHour = parseInt(option.getAttribute('data-price-hour'));
                const priceDay = parseInt(option.getAttribute('data-price-day'));

                const start = new Date(startDateInput.value + ' ' + (startTimeInput.value || '00:00'));
                const end = new Date(endDateInput.value + ' ' + (endTimeInput.value || '23:59'));

                const diffMs = end - start;
                const diffHours = diffMs / (1000 * 60 * 60);
                const diffDays = Math.ceil(diffHours / 24);

                let total = 0;
                if (diffDays >= 1 && diffHours >= 8) {
                    // Use daily rate if more than 8 hours
                    total = diffDays * priceDay;
                } else {
                    // Use hourly rate
                    total = Math.ceil(diffHours) * priceHour;
                }

                document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
            }
        });
    </script>
@endsection
