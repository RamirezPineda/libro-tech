<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $products = collect();
        if ($this->search != '') {
            $products = Producto::where('titulo', 'like', '%' . $this->search . '%')->get();
        }

        return view('livewire.search-products', compact('products'));
    }
}
