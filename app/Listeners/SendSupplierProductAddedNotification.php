<?php

namespace App\Listeners;

use App\Events\SupplierProductAdded;
use App\Models\Brand;
use App\Mail\SupplierProductAddedNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSupplierProductAddedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(SupplierProductAdded $event)
    {
        $brands = Brand::whereHas('categories', function ($query) use ($event) {
            $query->where('id', $event->product->category_id);
        })->get();
         
        foreach ($brands as $brand) {
            Mail::to($brand->email)->send(new SupplierProductAddedNotificationMail($event->product));
        }
    }
}
