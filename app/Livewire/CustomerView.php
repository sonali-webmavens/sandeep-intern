<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CreateCustomer;

class CustomerView extends Component
{
    public $customer;
    public $title;

    protected $listeners = ['customerSelected'];

    public function customerSelected($customerId)
    {
        $this->customer = CreateCustomer::findOrFail($customerId);
        $this->title = 'Customer Profile';
    }

    public function redirectBackToCustomerData()
    {
        return redirect()->route('customer.show');
    }

    public function render()
    {
        return view('livewire.customer-view');
    }
}
