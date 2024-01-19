<div>
    <form wire:submit="add">
        <input type="text" wire:model="todo">

        <button type="button" wire:click="add">Add</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>
</div>
