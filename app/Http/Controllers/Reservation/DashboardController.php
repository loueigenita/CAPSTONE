<?php

namespace App\Http\Controllers\Reservation;

use App\Models\Reservation\Category;
use App\Models\Reservation\Contact;
use App\Models\Reservation\Item;
use App\Models\Reservation\Reservation;
use App\Models\Reservation\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $sliderCount = Slider::count();
        $reservations = Reservation::where('status',false)->get();
        $reservation = Reservation::get();
        $contactCount = Contact::count();
        return view('reservation.admin.dashboard',compact('categoryCount','itemCount','sliderCount','reservations','contactCount'));
    }
}
