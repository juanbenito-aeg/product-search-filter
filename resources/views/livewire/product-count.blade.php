<?php

// use Livewire\Volt\Component;
// use Livewire\Attributes\Reactive;

// new class extends Component {
//     #[Reactive]
//     public $products;

//     public function with(): array
//     {
//         return [
//             "count" => $this->products->count(),
//         ];
//     }
// };

use function Livewire\Volt\{state};

state(["count"])->reactive();

?>

<div>
    <h1>{{ $count }}</h1>
</div>
