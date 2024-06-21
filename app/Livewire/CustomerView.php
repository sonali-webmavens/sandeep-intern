<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CreateCustomer;

class CustomerView extends Component
{
    public $customer;
    public $title;


    public function mount($viewid)
    {
        $this->customer = CreateCustomer::findOrFail($viewid);
        $this->title = 'Customer Profile';
    }
    public function render()
    {
        return view('livewire.customer-view');
    }
    public function redirectBackToCustomerData()
    {
        return redirect()->route('customer.show');
    }
}
