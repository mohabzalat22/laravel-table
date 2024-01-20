<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('skeleton');
    }

    #[On('created')]
    public function render()
    {
        $records = User::latest()->paginate(5);
        return view('livewire.table',[
            'records' => $records,
        ]);
    }
}
