<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_order)
    {
        $order = Order::with('menu')->find($id_order);
        if (!$order) {
            abort(404, "Order not found.");
        }
        $billData = [
            'bill' => Bill::where('id_order', $id_order)->get(),
            'order' => Order::all()->where('id_order', $id_order),
        ];
        $pdf = Pdf::loadView('bill',['data' => $billData]);
        return $pdf->download('bill.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
