<?php

namespace App\Livewire;

use Livewire\Component;

class Customer extends Component
{
    public function render()
    {
        return view('livewire.customer');
    }
    public function save(){
        dd('hyy i am a sandip');
    }
}
