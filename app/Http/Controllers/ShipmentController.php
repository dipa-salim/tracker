<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;

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

   
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data_user = User::where('email', auth()->user()->email)->first();
            // dd($data_mahasiswa);

            if ($request->spb_number == "") {
                Alert::error('Gagal', 'Nomor SPB harus diisi');
                return redirect()->back();
            }

            if ($request->client_name == "") {
                Alert::error('Gagal', 'Nama client/penerima harus diisi');
                return redirect()->back();
            }

            if ($request->client_place == "") {
                Alert::error('Gagal', 'Lokasi harus diisi');
                return redirect()->back();
            }

            $insert = Shipment::create([
                'id_user' => $data_user->id_user,
                'client_name' => $request->client_name,
                'client_place' => $request->client_place,
                'spb_number' => $request->spb_number,
                'status' => 'on_progress'
            ]);

            // if ($request->hasFile('url_surat_dosen')) {
            //     $update = MhsBimbingan::where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->whereNotIn('status_dospem', ['dibatalkan'])->update([
            //         'id_surat_tugas' => $insert->id
            //     ]);
            // }

            DB::commit();
            Alert::success('Berhasil', 'Selamat bekerja !');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Alert::error('Gagal', $e->getMessage());
            return redirect()->back();
        }
    }

    
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
