<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CreateCustomer;

class CustomerCreate extends Component
{
    public $name;
    public $email;
    public $phone;

    public function render()
    {

        return view('livewire.customer-create');
    }


    public function save()
    {

        $validatedData = $this->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:10',
        ]);

        CreateCustomer::create($validatedData);
        return redirect(route('customer.show'));

    }

}
