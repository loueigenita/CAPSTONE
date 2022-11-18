<?php

namespace App\Http\Controllers\Reservation;

use App\Models\Reservation\Contact;
use Illuminate\Http\Request;
// use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('reservation.admin.contact.index',compact('contacts'));
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('reservation.admin.contact.show',compact('contact'));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        // Toastr::success('Contact Message successfully deleted','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('toast_success','Contact Message Deleted Successfully');
    }
}
