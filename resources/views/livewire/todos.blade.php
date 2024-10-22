<?php

use function Livewire\Volt\{state, with};

state(['task']);

with([
    'todos' => fn() => auth()->check() ? auth()->user()->todos : []
]);

$add = function () {
    $todo = auth()->user()->todos()->make([
        'task' => $this->task
    ]);
    $todo->save();

    Mail::to(auth()->user())
        ->queue(new TodoCreated($todo));
};


$delete = fn (\App\Models\Todo $todo) => $todo->delete();

?>

<div>
    <form wire.submit.prevent="add">
        <input type="text" wire:model='task'>
        <button type=submit>Add</button>
    </form>

    <div>
        @foreach($todos as $todo)
            <div>
               {{ $todo->task }}
               <button type="submit" wire:click='delete({{ $todo->id }})'>X</button>
            </div>
        @endforeach
    </div>
</div>