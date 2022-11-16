<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;

class LogTable extends Component
{
    public function render()
    {
        // $user = User::where('email', auth()->user()->email)->first();
        // $data_shipment = Shipment::whereIn('status', ['pending', 'done'])->where('id_user', $user->id_user)->get();
        $data_shipment = Shipment::all();

        return view('livewire.log-table', [
            'shipment' => $data_shipment
        ])
            ->extends('layout.app')
            ->section('content');
    }
}
