<?php

namespace App\Livewire;

use Livewire\Component;

class TestFailure extends Component
{
    public string $cheese = 'American';

    public function mount(string $cheese)
    {
        $this->cheese = $cheese;
    }

    public function render()
    {
        return view('livewire.test-failure');
    }
}
