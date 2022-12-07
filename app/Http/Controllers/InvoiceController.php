<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Invoice;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\PDF as PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
        $invoices = Invoice::latest()->paginate(10);
        $products = Product::get();

        return view('invoices.index',compact('clients', 'invoices', 'products')) ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $clients)
    {
        $clients = Client::get();
        $invoices = Invoice::get();
        $products = Product::get();

        return view('invoices.create',compact('clients', 'products','invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoices)
    {
        $validator = Validator::make($request->all(), [
            'invoice_no'                =>         'required|numeric',
            'invoice_date'       =>          'required|date',
            'due_date'       =>          'required|date',
            'product_price'            =>    'required|regex:/^\d+(\.\d{1,2})?$/',
            'product_name'            =>         'required|string|min:2',
            'product_qty'            =>        'required|numeric',
            'client'            =>         'required|string',
            'client_address'                 =>        'required|string',
            'status'                 =>         'required|boolean',
        ]);

        if ($validator->fails()) {


           return redirect()->back()->withErrors($validator->errors())->with('toast_error', 'There was a problem');
        }

        $invoices = Invoice::create([


            'invoice_no'                =>         $request->invoice_no,
            // 'customer_id'                 =>         $request->customer_id,
            'invoice_date'       =>         $request->invoice_date,
            'due_date'       =>         $request->due_date,
            'product_price'            =>         $request->product_price,
            'product_name'            =>         $request->product_name,
            'product_qty'            =>         $request->product_qty,
            'client'            =>         $request->client,
            'client_address'                 =>         $request->client_address,
            'status'                 =>         $request->status,
            'total'            =>       $request->product_qty*$request->product_price,

            ]);
            if(!$invoices){

                return redirect()->back()->with('toast_error', 'There was a problem. ');
            }
            return redirect()->route('invoices.index')->with('toast_success', 'Created Successfully.  ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceController  $invoiceController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('invoices.view_invoice', compact('invoice'));
    }

    public function generatePDF($id)
    {
        $invoice = Invoice::find($id);
        $pdf = PDF::loadView('invoices.cust_inv_details', compact('invoice'));
        return $pdf->stream('Cust_nvoice.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceController  $invoiceController
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::get();
        $products = Product::get();
        return view('invoices.edit', compact('clients', 'products'))->with('invoice', $invoice)->with('toast_success', 'Updated Successfully.');
    }

    /**s
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceController  $invoiceController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {

        $invoice->due_date                 =          $request->due_date;
        $invoice->product_price            =          $request->product_price;
        $invoice->product_qty              =          $request->product_qty;
        $invoice->status                   =          $request->status;


        if (! $invoice->save()){
            return redirect()->back()->with('error', 'Sorry There is a problem in Updating the Invoice. ');
        }
        return redirect()->route('invoices.index')->with('toast_success', 'SuccessFully Updating The Invoice.  ');

        }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceController  $invoiceController
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
         return redirect()->back()->with('toast_success', 'Deleted Successfully.');
    }



//     public function mobilePreview($id)
//     {
//         $clients = Client::findorFail(1);
//         $invoice = Invoice::findorfail($id);
//         return view('invoices.mobile_invoice', compact('clients', 'invoice'));
//     }
 }
