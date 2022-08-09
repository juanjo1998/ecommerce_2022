<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryProducts extends Component
{
    public $category;

    /* products */

    public $products = [];

    public function loadCategoryProducts()
    {
        $this->products = $this->category->products()
                          ->where('status',2)
                          ->take(6)
                          ->get();

        // Emicion de evento para ejecutar el script glider.js

        $this->emit('glider-loadCategoryProducts',$this->category->id);
    }
    
    public function render()
    {        
        return view('livewire.category-products');
    }
}
