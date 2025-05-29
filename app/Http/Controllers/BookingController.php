<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Resources\BookingResource;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{
    public function index()
    {
        return BookingResource::collection(Booking::latest()->get());
    }

    public function store(StoreBookingRequest $request)
{
    // Merge location from request if not present in validated data
    $data = $request->validated();
    if ($request->has('location')) {
        $data['location'] = $request->input('location');
    }
    $booking = Booking::create($data);
    return new BookingResource($booking);
}

    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->only('status'));
        return new BookingResource($booking);
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json(null, 204);
    }
}
