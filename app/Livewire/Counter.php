<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Counter')]
class Counter extends Component
{
    public function render()
    {
        return view('livewire.counter');
    }
}
