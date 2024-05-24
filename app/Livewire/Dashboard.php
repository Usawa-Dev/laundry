<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use App\Services\CountableDataservice;
use Livewire\Attributes\On;
use App\Services\ProductService;
use App\Services\OrderBasketService;

class Dashboard extends Component
{

    public $productsDashboard;
    public $records;
    public ?string $productId;
    public ?string $color;

    public $products;
    public $counPendingOrders;
    public $countPaidOrders;
    public $countUsers;
    public $countClients;


    #[On('Initialised')]
    public function render(ProductService $productService)
    {
        $this->counPendingOrders = CountableDataservice::countUnconfirmedOrders();
        $this->countPaidOrders = CountableDataservice::countConfirmedOrders();
        $this->countClients = CountableDataservice::countClients();
        $this->countUsers  = CountableDataservice::countUser();
        $this->records = Customer::all();
        $this->productsDashboard = $productService->productByOrder();
        $this->products = $productService->AllProducts();
        return view('livewire.dashboard');
    }



    public function order(int $customerId)
    {
        dd($customerId);
    }

    public function confirm(int $orderId)
    {

        $order = Order::findOrFail($orderId);
        $order->update([
            "status" => 1
        ]);

        session()->forget("customer_id");

        $this->dispatch('confirmed');
    }

    public function store(ProductService $productService)
    {

        $productService->storeProduct($this->productId, $this->color);

        flash()->addSuccess('Article ajoute avec succes');
        $this->dispatch('Productstored');
        $this->restore();
    }

    public function orderInit(OrderBasketService $orderBasketService, int $customerId)
    {
        $orderBasketService->initBasket($customerId);
        flash()->addSuccess('commande creer, fermer le modal');
        $this->dispatch('Initialized');
    }

    private function restore()
    {
        $this->productId = "";
        $this->color = "";
    }
}
