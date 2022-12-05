<?php

namespace App\Http\Controllers;


use DB;
use Livewire\Request;
use App\Models\Shipment;
use App\Models\ShipmentHistory;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use RealRashid\SweetAlert\Facades\Alert;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        //
    } 
}
