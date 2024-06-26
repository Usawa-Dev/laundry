<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Customer;
use App\Services\OrderBasketService;

class Search extends Component
{
    public $records;
    public string $roomSearch;

    // protected $listeners = ["confirmed" => 'render'];
    #[On('confirmed')]
    public function render()
    {
        $this->records = Customer::all();
        return view('livewire.search');
    }

    public function searchRoom() {
        if (!empty($this->roomSearch)) {

            $this->records = Customer::limit(10)->get();

        }
    }

    public function order(OrderBasketService $orderBasketService, int $customerId) {
        $orderBasketService->initBasket($customerId);
        $this->dispatch('Initialized');
    }
}
