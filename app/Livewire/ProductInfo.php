<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductInfo extends Component
{
    public Product $product;
    public string $name;
    public string $description;

    public function mount()
    {
        $this->fill($this->product->only("name", "description"));
    }

    public function render()
    {
        return view('livewire.product-info');
    }
}
