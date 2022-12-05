<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shipment;
use App\Models\ShipmentHistory;
use Illuminate\Foundation\Auth\User;
use RealRashid\SweetAlert\Facades\Alert;

class LogTable extends Component
{
    public User $userId ;
    public $spb_number, $client_name, $client_place;

    // public function mount($userId)
    // {
    //     $this->userId = 
    // }
    
    public function render()
    {
        // $user = User::where('email', auth()->user()->email)->first();
        // $data_shipment = Shipment::whereIn('status', ['pending', 'done'])->where('id_user', $user->id_user)->get();
        $userId = User::where('email', auth()->user()->email)->first();
        $data_shipment = Shipment::orderBy('id_shipment', 'DESC')->where('id_user',$userId->id_user)->get();

        return view('livewire.log-table', [
            'shipment' => $data_shipment
        ])
            ->extends('layout.app')
            ->section('content');
    }

    public function store()
    {
        $this->validate([
            'spb_number' => 'required',
            'client_name' => 'required',
            'client_place' => 'required',
        ]);

        $insert = Shipment::create([
            'id_user' => $this->$userId->id_user,
            'client_name' => $this->client_name,
            'client_place' => $this->client_place,
            'spb_number' => $this->spb_number,
            'status' => 'dalamPerjalanan'
        ]);

        $insert->save();

        $usernameShipmentId = $userId->username;
        $nameShipmentId = $userId->name;
        $roleShipmentId = $userId->role;
        $mailShipmentId = $userId->email;
        $userShipmentId = $insert->id_user;
        $shipmentId = $insert->id_shipment;
        $cnameShipmentId = $insert->client_name;
        $cplaceShipmentId = $insert->client_place;
        $spbShipmentId = $insert->spb_number;
        $statusShipmentId = $insert->status;

        $history = ShipmentHistory::create([
            'id_shipment' => $shipmentId,
            'id_user' => $userShipmentId,
            'username' => $usernameShipmentId,
            'name' => $nameShipmentId,
            'role' => $roleShipmentId,
            'email' => $mailShipmentId,
            'client_name' => $cnameShipmentId,
            'client_place' => $cplaceShipmentId,
            'spb_number' => $spbShipmentId,
            'status' => $statusShipmentId
        ]);

        Alert::success('Berhasil', 'Selamat bekerja !');

        // $this->resetInput();
    }
}
