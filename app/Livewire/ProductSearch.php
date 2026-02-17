<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    public $search = "";
    // public $category = "";
    public $sortBy = "latest";

    // protected $queryString = ["search", /* "category", */ "sortBy"]; 

    public function updated($property) 
    {
        if ($property === "search" || $property === "sortBy") {
            $this->resetPage();
        }
    }

    public function redirectt()
    {
        return redirect()->to("/form")->with("data", "Some data :)");
    }

    public function render()
    {
        // $products = Product::when($this->search, fn($q) => $q->whereLike("name", "%$this->search%"))
        //                    ->when($this->sortBy === "latest", fn($q) => $q->latest())
        //                    ->when($this->sortBy === "price-low", fn($q) => $q->orderBy("price", "asc"))
        //                    ->when($this->sortBy === "price-high", fn($q) => $q->orderBy("price", "desc"))
        //                    ->paginate(12);

        $query = Product::query();

        if ($this->search) {
            $query->whereLike("name", "%$this->search%");
        }

        switch ($this->sortBy) {
            case "latest":
                $query->latest();
                break;

            case "price-low":
                $query->orderBy("price", "asc");
                break;

            case "price-high":
                $query->orderBy("price", "desc");
                break;
        }

        $products = $query->paginate(12);

        return view('livewire.product-search', ([
            "products" => $products,
        ]));
    }
}
