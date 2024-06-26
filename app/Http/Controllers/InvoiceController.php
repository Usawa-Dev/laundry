<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\OrderService;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function __construct(public OrderService $orderService)
    {
    }
    public function create(int $order)
    {


        $pdf = PDF::loadView('invoice',  $data = ["data" => $this->orderService->invoice($order)]);

        return $pdf->stream($data['data'][0]->name, '.pdf');
    }
}
