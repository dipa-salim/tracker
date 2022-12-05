<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Shipment;
use App\Models\ShipmentHistory;
use RealRashid\SweetAlert\Facades\Alert;

class LogForm extends Component
{
    public $shipment;
    

    public function mount($shipment)
    {
        $this->shipment = $shipment;
    }

    public function render()
    {
        return view('livewire.log-form');
    }

    

    // public function resetInput()
    // {
    //     $this->spb_number = null;
    //     $this->client_name = null;
    //     $this->client_place = null;
    // }
}
