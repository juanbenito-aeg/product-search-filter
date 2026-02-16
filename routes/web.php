<?php

use App\Livewire\Form;
use App\Livewire\ProductSearch;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', ProductSearch::class);
Route::get('/form', Form::class);
Volt::route('/products', 'product-list');