<?php

namespace App\Http\Controllers\Reservation;

use App\Notifications\ReservationConfirmed;
use App\Models\Reservation\Reservation;
use App\Models\Reservation\Slider;
use Illuminate\Http\Request;
// use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();        
        $reservations = Reservation::paginate(10);        

        return view('inventory.Food Reservation.index',compact('reservations'));
    }
    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Notification::route('mail',$reservation->email )
            ->notify(new ReservationConfirmed());

        return redirect()->back()->with('toast_success', 'Reservation Confirmed Successfully');
    }
    public function destroy($id){
        Reservation::find($id)->delete();

        return redirect()->back()->with('toast_success', 'Deleted Successfully');
    }
}
