<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Panel extends Component
{
    use WithPagination;

    #[Url(history:true)]
    public $search ='';

    #[Url(history:true)]
    public $perpage = 5;

    #[Url(history:true)]
    public $role = '';

    #[Url(history:true)]
    public $sortby = 'created_at';

    #[Url(history:true)]
    public $sortdir = 'desc'; 

    public function sort($column)
    {
        if($this->sortby == $column)
        {
            $this->sortdir = ( $this->sortdir == 'desc' ) ? 'asc' : 'desc';
            return;
        }
        $this->sortby = $column;
        $this->sortdir = 'desc';
    }

    public function delete($id)
    {
        if(User::find($id))
        {
            User::find($id)->delete();
        }
    }
    public function render()
    {
        $records = User::
        search($this->search)
        ->when($this->role !== '', function($q)
        {
            $q->where('is_admin',$this->role);
        })
        ->orderby($this->sortby,$this->sortdir)
        ->paginate($this->perpage);
        return view('livewire.panel', [
            'records' => $records,
        ]);
    }
}
