<?php

namespace App\Http\Controllers;

use App\Models\Reservation\Reservation;
// use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function reserve(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|min:3|max:11',
            'email' => 'required|email',
            'dateandtime' => 'required',
            'items' => 'required'
        ]);
        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        $reservation->items = implode(' | ',$request->items);
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();

        return redirect()->back()->with('toast_success','Reservation request sent successfully. we will confirm to you shortly');
    }
}
