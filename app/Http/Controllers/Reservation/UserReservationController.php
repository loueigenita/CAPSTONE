<?php

namespace App\Http\Controllers\Reservation;

use App\Notifications\ReservationConfirmed;
use App\Models\Reservation\Reservation;
use App\Models\Reservation\Slider;
use App\Models\Reservation\Category;
use App\Models\Reservation\Item;
use Illuminate\Http\Request;
// use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class UserReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {

        $sliders = Slider::get();
        $categories = Category::get();
        $items = Item::get();
        $reservations = Reservation::all();        
        $reservations = Reservation::paginate(1);        

        return view('reservation.user.reservation',compact('reservations', 'sliders', 'categories', 'items'));
    }
}
