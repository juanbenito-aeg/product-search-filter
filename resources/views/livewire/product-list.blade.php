<?php

use Livewire\Volt\Component;
use App\Models\Product;
use function Livewire\Volt\{computed};

// new class extends Component {
//     public function with(): array
//     {
//         return [
//             "products" => Product::all(),
//         ];
//     }

//     public function deleteProduct()
//     {
//         $product = Product::where("id", ">", 0)->first();

//         $product->delete();
//     }
// }; 

$products = computed(fn () => Product::all());

$deleteProduct = function () {
    $product = Product::where("id", ">", 0)->first();

    $product->delete();
};

?>

<div>
    <livewire:product-count :count="$this->products->count()" />
    
    <button type="button" wire:click="deleteProduct">
        Delete product
    </button>
</div>
