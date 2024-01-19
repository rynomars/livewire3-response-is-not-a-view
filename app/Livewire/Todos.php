<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Todos')]
class Todos extends Component
{
    public string $todo;
    public array $todos;

    public function mount()
    {
        $this->todos = [
            'Take out trash',
            'Do dishes',
        ];

        $this->todo = '';
    }

    public function add()
    {
        $this->todos[] = $this->todo;

        $this->reset('todo');
    }
    public function render()
    {
        return view('livewire.todos');
    }
}
