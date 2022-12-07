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
        $contacts = Contact::paginate(8);
        return view('inventory.Contact.index',compact('contacts'));
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('inventory.Contact.show',compact('contact'));
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        // Toastr::success('Contact Message successfully deleted','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('toast_success','Contact Message Deleted Successfully');
    }
}
