<?php

namespace App\Livewire;

use App\Models\CreateCustomer;
use Livewire\Component;

class Customer extends Component
{
    public $name = "";
    public $email = "";
    public $phone = "";

    public function render()
    {
        return view('livewire.customer');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name'=> 'required|max:50',
            'email'=> 'required|email',
            'phone'=> 'required|max:10',
        ]);

        CreateCustomer::create($validatedData);

        $this->reset(['name', 'email', 'phone']);

    }
}
