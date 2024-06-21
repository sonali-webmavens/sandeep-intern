<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CreateCustomer;

class CustomerEdit extends Component
{
    public $editid;
    public $name;
    public $email;
    public $phone;

    public function mount($editid)
    {
        $customer = CreateCustomer::find($editid);

        if ($customer) {
            $this->editid = $customer->id;
            $this->name = $customer->name;
            $this->email = $customer->email;
            $this->phone = $customer->phone;
        }
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:10',
        ]);
        $customer = CreateCustomer::find($this->editid);

        if ($customer) {
            $customer->update($validatedData);
        }
        return redirect()->route('customer.show');
    }
    public function redirectBackToCustomerData()
    {
        return redirect()->route('customer.show');
    }
    public function render()
    {
        return view('livewire.customer-edit');
    }
}
