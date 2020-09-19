<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\User as UserCollection;
use App\Models\User;

class UserController extends Controller
{
    public function bookings()
    {
        return new UserCollection(User::with('bookings')->has('bookings')->paginate(5));
    }
}
