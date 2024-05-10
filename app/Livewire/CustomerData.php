<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CreateCustomer;

class CustomerData extends Component
{
    public $customers = [];
    public $title;
    protected $listeners = ['viewCustomer'];

    public function viewCustomer($customerId)
    {
        $this->emit('customerSelected', $customerId);
    }

    public function mount()
    {
        $this->title = "Customer All Data";
        $this->customers = CreateCustomer::all();
    }

    // Emit an event when a customer is clicked
    public function selectCustomer($customerId)
    {
        $this->emit('customerSelected', $customerId);
    }

    public function render()
    {
        return view('livewire.customer-data');
    }
}
