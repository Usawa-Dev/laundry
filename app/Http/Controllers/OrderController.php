<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("user.orderList");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deliver(int $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            "confirmed" => 1
        ]);

        return redirect()->back();
    }
    public function confirm(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update([
            "status" => 1
        ]);

        session()->forget("customer_id");
        

      
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
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
    public function update(UpdateOrderRequest $request, Order $order)
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
