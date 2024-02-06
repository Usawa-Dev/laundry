<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade;

class CountableDataservice
 {
    public static function countConfirmedOrders(){
        return Order::whereConfirmed(true)->count();
    }

    public static function countUnconfirmedOrders(){
        return Order::whereConfirmed(false)->count();
    }
    public static function countUser(){
        return User::count();
    }
    public static function countClients(){
        return Customer::count();
    }
 }
