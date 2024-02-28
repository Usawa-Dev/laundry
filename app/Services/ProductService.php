<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\Order\VerifyUserAction;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductService
{

    private int $orderId;
    private int $customer_id;
    public function __construct(public OrderService $orderService, public VerifyUserAction $verifyUserAction)
    {
        $this->customer_id = (int) session()->get("customer_id");
    }
    public function productByOrder()
    {

        // return Order::where("customer_id", $this->customer_id)->where("status",false)->with("productsOrders")->leftJoin("order_products")->get();
        return  DB::table("orders")->join("order_products", "orders.id", "=", "order_products.order_id")
            ->join("products", "order_products.product_id", "=", "products.id")->where("orders.customer_id", $this->customer_id)->select("orders.id as order_id", "products.*", "order_products.*")->get();
    }

    public function AllProducts()
    {
        return Product::latest()->get();
    }

    public function storeProduct(string $idProduct, string $color)
    {

        if ($this->verifyUserAction->UserExist() !== null) {
            $this->orderId = $this->verifyUserAction->UserExist();
        }

        if ($this->verifyUserAction->userDoesNotExist() === true) {
            $this->orderId = $this->orderService->store()->id;
        }

        if ($this->orderId != null) {
            OrderProduct::create(
                [
                    'product_id' => $idProduct,
                    'color' => $color,
                    'order_id' => $this->orderId
                ]

            );
        }
    }

    public function deleteProduct(int $productId)
    {
        dd($productId);
        Product::destroy($productId);
    }
}
