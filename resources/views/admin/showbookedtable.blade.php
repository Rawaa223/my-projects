@extends('admin.maindesign')

@section('show_booked_tables')
<style>
    .booking-panel {
        margin: 18px;
        padding: 24px;
        background: #2d3035;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.22);
    }

    .booking-title {
        margin: 0 0 8px;
        color: #fff;
        font-size: 1.4rem;
        font-weight: 700;
    }

    .booking-subtitle {
        margin: 0 0 18px;
        color: #9ca3af;
        font-size: 0.95rem;
    }

    .booking-table-wrap {
        overflow-x: auto;
        border-radius: 14px;
    }

    .booking-table {
        width: 100%;
        min-width: 980px;
        border-collapse: collapse;
        background: #25282d;
        color: #e5e7eb;
    }

    .booking-table thead th {
        padding: 16px 14px;
        background: #f8fafc;
        color: #6b7280;
        font-size: 0.9rem;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
    }

    .booking-table tbody td {
        padding: 16px 14px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        vertical-align: top;
    }

    .booking-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.03);
    }

    .booking-contact strong {
        display: block;
        color: #fff;
        font-size: 0.98rem;
    }

    .booking-muted {
        color: #9ca3af;
        font-size: 0.9rem;
    }

    .booking-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(59, 130, 246, 0.16);
        color: #93c5fd;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .booking-message {
        max-width: 280px;
        color: #dbe4f0;
        line-height: 1.5;
    }

    .booking-empty {
        padding: 32px 20px;
        color: #d1d5db;
        text-align: center;
    }
</style>

<div class="booking-panel">
    <h2 class="booking-title">Booked Tables</h2>
    <p class="booking-subtitle">Track reservation requests, guest counts, schedules, and customer notes.</p>

    <div class="booking-table-wrap">
        <table class="booking-table">
            <thead>
                <tr>
                    <th>Guest</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                    <th>Message</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookedTables as $booked_table)
                    <tr>
                        <td class="booking-contact">
                            <strong>{{ $booked_table->name }}</strong>
                        </td>
                        <td class="booking-muted">{{ $booked_table->email }}</td>
                        <td class="booking-muted">{{ $booked_table->phone }}</td>
                        <td>{{ $booked_table->date }}</td>
                        <td>{{ $booked_table->time }}</td>
                        <td>
                            <span class="booking-badge">{{ $booked_table->guest_number }} Guests</span>
                        </td>
                        <td class="booking-message">{{ $booked_table->message ?: 'No message provided.' }}</td>
                        <td class="booking-muted">{{ $booked_table->updated_at?->format('M d, Y h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="booking-empty">No table reservations have been submitted yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
