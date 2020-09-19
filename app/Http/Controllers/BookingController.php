<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Booking as BookingCollection;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        return new BookingCollection(Booking::with('user')->paginate(5));
    }
}
