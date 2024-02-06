<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Services\ProductService;
use App\Services\OrderBasketService;

class Dashboard extends Component
{

    public $productsDashboard;
    public $records;
    public ?string $name;
    public ?string $description;

    #[On('Initialised')]
    public function render(ProductService $productService)
    {
        $this->records = Customer::all();
        $this->productsDashboard = $productService->productByOrder();
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

        $productService->storeProduct($this->name, $this->description);

        flash()->addSuccess('Article ajoute avec succes');
        $this->dispatch('Productstored');
        $this->restore();
    }

    public function orderInit(OrderBasketService $orderBasketService, int $customerId)
    {
        $orderBasketService->initBasket($customerId);
        $this->dispatch('Initialized');
    }

    private function restore()
    {
        $this->name = "";
        $this->description = "";
    }
}
