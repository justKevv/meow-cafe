<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Bill;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order', [
            "Title" => "Order",
            "order" => Order::latest("id_order")->get(),
            'menu' => Menu::all()->sortBy('kategori'),
            'meja' => Meja::all(),
            'lantai' => Meja::get('lantai'),
        ]);
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
        $lantai = $request->input('lantai');
        $tables = Meja::where('lantai', $lantai)->get();
        $randomTable = $tables->random();
        try {
            $ValidatedData = $request->validate([
                'nama_pemesan' => 'required',
                'tgl_order' => 'required|date',
                'id_menu' => 'required|exists:menu,id_menu',
                'kuantitas' => 'required|numeric',
                'metode_pembayaran' => 'required',

            ]);

            $menuPrice = Menu::where('id_menu', $ValidatedData['id_menu'])->first()->harga; //
            $totalPrice = $menuPrice * $ValidatedData['kuantitas'];

            $order = new Order();
            $order->nama_pemesan = $ValidatedData['nama_pemesan'];
            $order->tgl_order = $ValidatedData['tgl_order'];
            $order->id_menu = $ValidatedData['id_menu'];
            $order->kuantitas = $ValidatedData['kuantitas'];
            $order->total_harga = $totalPrice;
            $order->no_meja = $randomTable->no_meja; // Set the no_meja from randomMeja
            $order->metode_pembayaran = $ValidatedData['metode_pembayaran'];
            // Save the order to the database
            $order->save();

            $bill = new Bill();
            $bill->id_bill = 'meow'.$order->id_order;
            $bill->pass_wifi = 'meowmeow';
            $bill->id_order = $order->id_order;
            $bill->save();

            return redirect('/order');
        } catch (\Exception $e) {
            dd($e);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
