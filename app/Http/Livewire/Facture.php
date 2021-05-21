<?php

namespace App\Http\Livewire;
use App\Models\article;

use Livewire\Component;

class Facture extends Component
{
    public function render()
    {

        $articles = article::all();
        return view('livewire.facture',compact('articles'));
    }
}
