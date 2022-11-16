<?php

namespace App\Models;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShipmentHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_shipment','username','name','role','client_name','client_place','spb_number','status'
    ];

    protected $primaryKey = 'id_shipment_histories';

    protected $table = 'shipment_histories';

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, "id_shipment");
    }
}
