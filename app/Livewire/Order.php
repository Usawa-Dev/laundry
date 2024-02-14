<?php

namespace App\Livewire;

use App\Http\Requests\StoreOrderRequest;
use Livewire\Component;
use App\Services\OrderService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Order extends Component
{
    use LivewireAlert;

    public ?string $client_name;
    public ?string $phone;
    public ?string $room_name;
    public $orders;

    public $orderId;
    public $orderService;

    public function render(OrderService $orderService)
    {

        $this->orders = (Auth::user()->role_user == "admin") ? $orderService->getAll() : $orderService->ordersByUser();
        return view('livewire.order');
    }



    public function store(OrderService $orderService)
    {

        $orderService->store($this->client_name, $this->room_name, $this->phone);

        flash()->addSuccess('commande creee avec succes');
    }

    public function openConfirmModal(int $orderId)
    {
        dd($orderId);
        $this->orderId = $orderId;
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
}
