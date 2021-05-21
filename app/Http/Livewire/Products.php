<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Models\article;
use Livewire\Component;

class Products extends Component
{
    public $orderProducts = [];
    public $allProducts = [];
    public $selectedClass = null;
    public $selectedSection = null;
    public $sections = null;
//---------------------------------
//---------------------------------
public function mount()
{
   
    $this->orderProducts = [
        ['product_id' => '', 'quantity' => 1]
    ];
}


    public function render()
    {
        $students = student::all();
        $articles = article::all();
               
        return view('livewire.products',compact('students'),compact('articles'));
    }
   
    public function addProduct()
    {  info($this->orderProducts);
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }
    
    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }
    
}
