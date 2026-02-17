<?php

namespace App\Livewire;

use Livewire\Component;

class Form extends Component
{
    public string $postTitle = "";

    public function save()
    {
        dump($this->postTitle);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form');
    }
}
