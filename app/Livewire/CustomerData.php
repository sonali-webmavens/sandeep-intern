<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CreateCustomer;

class CustomerData extends Component
{
    public $customers = [];
    public $title;

    public function mount()
    {
        $this->title = "Customer All Data";
        $this->customers = CreateCustomer::all();
    }

    public function deleteCustomer($customerId)
    {
        $customer = CreateCustomer::find($customerId);
        if ($customer) {
            $customer->delete();
            return redirect()->route('customer.show');
        }
    }

    public function render()
    {
        return view('livewire.customer-data');
    }
}
