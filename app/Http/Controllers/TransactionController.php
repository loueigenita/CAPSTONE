<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Provider;
use Carbon\Carbon;
use App\Models\SoldProduct;
use App\Models\Transaction;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactionname = [
            'income' => 'Income',
            'payment' => 'Payment',
            'expense' => 'Expense',
            'transfer' => 'Transfer'
        ];

        $transactions = Transaction::latest()->paginate(25);

        return view('transactions.index', compact('transactions', 'transactionname'));
    }

    public function stats()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        
        $salesperiods = [];
        $transactionsperiods = [];

        $salesperiods['Day'] = Sale::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->get();
        $transactionsperiods['Day'] = Transaction::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->get();

        $salesperiods['Yesterday'] = Sale::whereBetween('created_at', [Carbon::now()->subDay(1)->startOfDay(), Carbon::now()->subDay(1)->endOfDay()])->get();
        $transactionsperiods['Yesterday'] = Transaction::whereBetween('created_at', [Carbon::now()->subDay(1)->startOfDay(), Carbon::now()->subDay(1)->endOfDay()])->get();

        $salesperiods['Week'] = Sale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $transactionsperiods['Week'] = Transaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

        $salesperiods['Month'] = Sale::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        $transactionsperiods['Month'] = Transaction::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();

        $salesperiods['Trimester'] = Sale::whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()])->get();
        $transactionsperiods['Trimester'] = Transaction::whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()])->get();

        $salesperiods['Year'] = Sale::whereYear('created_at', Carbon::now()->year)->get();
        $transactionsperiods['Year'] = Transaction::whereYear('created_at', Carbon::now()->year)->get();

        return view('transactions.stats', [
            'clients'               => Client::where('balance', '!=', '0.00')->get(),
            'salesperiods'          => $salesperiods,
            'transactionsperiods'   => $transactionsperiods,
            'date'                  => Carbon::now(),
            'methods'               => PaymentMethod::all()
        ]);
    }

    public function type($type)
    {
        switch ($type) {
            case 'expense':
                return view('transactions.expense.index', ['transactions' => Transaction::where('type', 'expense')->latest()->paginate(25)]);

            case 'payment':
                return view('transactions.payment.index', ['transactions' => Transaction::where('type', 'payment')->latest()->paginate(25)]);

            case 'income':
                return view('transactions.income.index', ['transactions' => Transaction::where('type', 'income')->latest()->paginate(25)]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        switch ($type) {
            case 'expense':
                return view('transactions.expense.create', [
                    'payment_methods' => PaymentMethod::all(),
                ]);

            case 'payment':
                return view('transactions.payment.create', [
                    'payment_methods' => PaymentMethod::all(),
                    'providers' => Provider::all(),
                ]);

            case 'income':
                return view('transactions.income.create', [
                    'payment_methods' => PaymentMethod::all(),
                ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transaction $transaction)
    {
        if ($request->get('client_id')) {
            switch ($request->get('type')) {
                case 'income':
                    $request->merge(['title' => 'Payment Received from Customer ID: ' . $request->get('client_id')]);
                    break;

                case 'expense':
                    $request->merge(['title' => 'Customer ID Return Payment: ' . $request->get('client_id')]);

                    if ($request->get('amount') > 0) {
                        $request->merge(['amount' => (float) $request->get('amount') * (-1)]);
                    }
                    break;
            }

            $transaction->create($request->all());
            $client = Client::find($request->get('client_id'));
            $client->balance += $request->get('amount');
            $client->save();

            return redirect()
                ->route('clients.show', $request->get('client_id'))
                ->with('toast_success','Successfully Registered Transaction');
        }

        switch ($request->get('type')) {
            case 'expense':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }

                $transaction->create($request->all());

                return redirect()
                    ->route('transactions.type', ['type' => 'expense'])
                    ->with('toast_success','Expense Recorded Successfully');

            case 'payment':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }

                $transaction->create($request->all());

                return redirect()
                    ->route('transactions.type', ['type' => 'payment'])
                    ->with('toast_success','Payment Registered Successfully');

            case 'income':
                $transaction->create($request->all());

                return redirect()
                    ->route('transactions.type', ['type' => 'income'])
                    ->with('toast_success','Income Successfully Registered');

            default:
                return redirect()
                    ->route('transactions.index')
                    ->with('toast_success','Successfully Registered Transaction.');
        }
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        switch ($transaction->type) {
            case 'expense':
                return view('transactions.expense.edit', [
                    'transaction' => $transaction,
                    'payment_methods' => PaymentMethod::all()
                ]);

            case 'payment':
                return view('transactions.payment.edit', [
                    'transaction' => $transaction,
                    'payment_methods' => PaymentMethod::all(),
                    'providers' => Provider::all()
                ]);

            case 'income':
                return view('transactions.income.edit', [
                    'transaction' => $transaction,
                    'payment_methods' => PaymentMethod::all(),
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        switch ($request->get('type')) {
            case 'expense':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }
                return redirect()
                    ->route('transactions.type', ['type' => 'expense'])
                    ->with('toast_success','Expense updated sucessfully.');

            case 'payment':
                if ($request->get('amount') > 0) {
                    $request->merge(['amount' => ((float) $request->get('amount') * (-1))]);
                }

                return redirect()
                    ->route('transactions.type', ['type' => 'payment'])
                    ->with('toast_success','Payment Updated Successfully');

            case 'income':
                return redirect()
                    ->route('transactions.type', ['type' => 'income'])
                    ->with('toast_success','Login Successfully Updated');

            default:
                return redirect()
                    ->route('transactions.index')
                    ->with('toast_success','Transaction Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //if ($transaction->sale)
        //{
        //    return back()->with('toast_success','You cannot remove a transaction from a completed sale. You can delete the sale and its entire record.');
        //}

        if ($transaction->transfer) {
            return back()->with('toast_errors','Cant delete a Transaction Records, Delete Transfer First');
        }

        $type = $transaction->type;
        $transaction->delete();

        switch ($type) {
            case 'expense':
                return back()->with('toast_success','Expense Successfully Deleted');

            case 'payment':
                return back()->with('toast_success','Payment Successfully Removed.');

            case 'income':
                return back()->with('toast_success','Entry Successfully Removed.');

            default:
                return back()->with('toast_success','Transaction Successfully Deleted');
        }
    }
}