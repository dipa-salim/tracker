<?php

namespace App\Models;

use App\Models\User;
use App\Models\ShipmentHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user', 'client_name', 'client_place', 'spb_number' ,'status'
    ];

    protected $primaryKey = 'id_shipment';

    protected $table = 'shipments';

    public function user()
    {
        return $this->belongsTo(User::class, "id_user");
    }

    public function histories()
    {
        return $this->hasMany(ShipmentHistory::class, "id_shipment");
    }
}
