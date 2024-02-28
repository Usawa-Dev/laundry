<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{


    public function getAll(): Collection
    {
        return Order::latest()->with("customer")->withCount("products")->get();
    }

    public function ordersByUser(): Collection
    {
        return Order::whereUserId(Auth::user()->id)->latest()->withCount("products")->get();
    }

    public function store()
    {
        return     Order::create([
            "code" => $this->codeGenerate(),
            "user_id" => Auth::user()->id,
            "customer_id" => session()->get("customer_id")
        ]);
    }

    public function show(?int $OrderId)
    {
        return Order::whereId($OrderId)->first();
    }


    protected function codeGenerate()
    {

        return '#' . date('Y-m-d') . rand(1, 1000);
    }

    // public function invoice(int $orderId){
    //     return Order::where("id", $orderId)->with("products")->with("customer")->first();
    // }


    public function invoice(int $orderId)
    {
        return  DB::table("orders")->join("order_products", "orders.id", "=", "order_products.order_id")
            ->join("products", "order_products.product_id", "=", "products.id")->join("customers", "orders.customer_id", "customers.id")->where("orders.id", $orderId)->select("orders.*", "products.*", "order_products.*", "customers.*")->get();
    }
}
