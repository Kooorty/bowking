<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Auth::user()->bookings()->latest()->get();
        $unreadCount = Auth::user()->unreadNotifications()->count();
        return view('dashboard', compact('bookings', 'unreadCount'));
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'booking_date' => 'required|date',
            'booking_time' => 'required'
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time
        ]);

        Notification::create([
            'user_id' => Auth::id(),
            'message' => "Booking created: {$booking->name}"
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking created successfully!');
    }

    public function edit(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'booking_date' => 'required|date',
            'booking_time' => 'required'
        ]);

        $booking->update($request->all());

        Notification::create([
            'user_id' => Auth::id(),
            'message' => "Booking updated: {$booking->name}"
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $bookingName = $booking->name;
        $booking->delete();

        Notification::create([
            'user_id' => Auth::id(),
            'message' => "Booking deleted: {$bookingName}"
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking deleted successfully!');
    }
}