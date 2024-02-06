<?php

namespace App\Livewire;

use App\Services\ProductService;
use Livewire\Component;

class CreateOrderList extends Component
{

    public ?string $name;
    public ?string $description;
    public int $orderId;
    public $products;
    protected $listeners = ["Initialized" => 'render'];

    public function render(ProductService $productService)
    {

        return view('livewire.create-order-list');
    }

    public function store(ProductService $productService)
    {

        $productService->storeProduct($this->name, $this->description);

           flash()->addSuccess('Article ajoute avec succes');
        $this->dispatch('Productstored');
    }

    public function delete(int $productId)
    {
        dd($productId);
        // $productService->deleteProduct($productId);
    }
}
