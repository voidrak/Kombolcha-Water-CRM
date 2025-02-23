<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::where("is_paid", false)->with("user")->orderBy('year', 'desc')->orderBy('month', 'desc')->latest()->get();

        $formattedBills = $bills->map(function ($bill) {
            $bill->month = date("F", mktime(0, 0, 0, $bill->month, 1)); // Convert month number to month name
            return $bill;
        });

        return $formattedBills;
    }


    public function getBillPaidBills()
    {
        $bills = Bill::where("is_paid", true)->with("user")->orderBy('year', 'desc')->orderBy('month', 'desc')->latest()->get();

        $formattedBills = $bills->map(function ($bill) {
            $bill->month = date("F", mktime(0, 0, 0, $bill->month, 1)); // Convert month number to month name
            return $bill;
        });

        return $formattedBills;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            "user_id" => 'required|exists:users,id',
            "amount" => 'required',
            "month" => 'required | max:2',
            "year" => 'required | max:4',
        ]);


        $validated['bill_number'] = $this->generateUniqueBillNumber();

        $bill = Bill::create($validated);

        return $bill;
    }


    private function generateUniqueBillNumber()
    {
        do {
            $billNumber = random_int(1000000000, 9999999999);
        } while (Bill::where('bill_number', $billNumber)->exists());

        return $billNumber;
    }


    public function show()
    {
        $bills = Bill::where('user_id', request()->user()->id)->where("is_paid", false)->orderBy('year', 'desc')->orderBy('month', 'desc')->latest()->get();

        $formattedBills = $bills->map(function ($bill) {
            $bill->month = date("F", mktime(0, 0, 0, $bill->month, 1)); // Convert month number to month name
            return $bill;
        });

        return $formattedBills;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        $validated = $request->validate([
            "is_paid" => 'required|boolean'
        ]);

        return $bill->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
