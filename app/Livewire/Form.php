<?php

namespace App\Livewire;

use Livewire\Component;

class Form extends Component
{
    public string $postTitle = "";


    public function save()
    {
        dump($this->pull("postTitle"));
    }

    public function render()
    {
        return view('livewire.form');
    }
}
