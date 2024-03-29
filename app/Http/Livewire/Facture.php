<?php

namespace App\Http\Livewire;
use App\Models\article;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;


class Facture extends Component
{
    public function render()
    {

        $articles = article::all();
        return view('livewire.facture',compact('articles'));
    }

    public function store(Request $request)
    {

        
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
        ]);

        foreach ($request->orderProducts as $product) {
            $order->products()->attach($product['product_id'],
                ['quantity' => $product['quantity']]);
        }

        
    }

}
