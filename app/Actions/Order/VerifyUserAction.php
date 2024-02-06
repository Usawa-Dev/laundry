<?php

namespace App\Actions\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class VerifyUserAction
{
    public $order = null;
    public function UserExist(): int
    {
       $this->order = Order::where("customer_id", session()->get("customer_id"))
            ->orderBy("id", "desc")
            ->whereStatus(false)->first();

            if ($this->order === null) {
              return false;
            } else {
            return $this->order->id;
        }

    }

    public function userDoesNotExist()
    {
        $this->order = Order::where("customer_id", session()->get("customer_id"))
            ->orderBy("id", "desc")
            ->whereStatus(false)->first();

        if (empty($this->order)) {
            return true;
        }
    }
}
