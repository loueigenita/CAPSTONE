<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Reservation\Reservation;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Reservation\Category;
use App\Models\Reservation\Item;
use App\Models\Reservation\Slider;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Reservation\Contact;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $sliders = Slider::get();
        $categories = Category::get();
        $items = Item::get();

        $reservation = Reservation::get();        
        $users = User::get();
        $products = Product::get();
        $invoices = Invoice::get();
        $pcategories = ProductCategory::get();
        $products = Product::get();
        $contacts =  Contact::get();
        $clients = Client::get();
        $reservations = Reservation::where('status',false)->get();
        $reservations1 = Reservation::where('status',true)->get();

        return view('dashboard', [

            'reservation'               => $reservation,
            'reservations'              => $reservations,
            'reservations1'              => $reservations1,
            'products'                  => $products,
            'users'                     => $users,
            'clients'                     => $clients,
            'contacts'                 => $contacts,
            'sliders'                 => $sliders,
            'items'                 => $items,
            'categories'                 => $categories,
            'invoices'                 => $invoices,
            'pcategories'                 => $pcategories,
            

        ]);

    }

    public function getCountReservation()
    {
        $reservation = Reservation::get();
        $reservations = Reservation::where('status',false)->get();

        return view('dashboard', compact('reservation', 'reservations'));

    }
}
