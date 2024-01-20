<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
class Form extends Component
{
    use WithFileUploads;
    // props
    public $name = '';
    public $email = '';
    public $password = '';
    public $image;
    // end props
    public function createNewUser()
    {
        // validation rules
        $this->validate([
            'name' => 'required|string|min:5|max:20',
            'email' => 'required|email',
            'password' => 'required|string',
            'image' => 'required|image|max:1024'
        ]);
        $imageSrc = $this->image->store('uploads','public');
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'image' => $imageSrc
        ]);

        // reset values
        $this->reset([
            'name',
            'email',
            'password',
            'image'
        ]);
        
        // flash session
        session()->flash('success');

        // dispatch
        $this->dispatch('created');
    }
    public function render()
    {
        $numberOfUsers = count( User::all());
        $users = User::paginate(2);
        return view('livewire.form',[
            'numberOfUsers' => $numberOfUsers,
            'users' => $users
        ]);
    }
}
