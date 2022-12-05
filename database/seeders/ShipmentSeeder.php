<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipments')->insert([
            'id_shipment' => 1,
            'id_user' => 2,
            'client_name' => 'Dr Ahmad',
            'client_place' => 'RSUD Bogor',
            'status' => 'dalamPerjalanan',
            'spb_number' => '123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => ''
        ]);
    }
}
