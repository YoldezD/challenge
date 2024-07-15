<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SupplierProductAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $supplierId;
    public $product;

    public function __construct($supplierId, Product $product)
    {
        $this->supplierId = $supplierId;
        $this->product = $product;
    }
}
