<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class controller_transaksi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = transaksi::all();
        return response()->json([
                "message" => "Berhasil mengambil Data transaksi",
                "data" => $transaksi
            ], Response::HTTP_OK);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                "nama_customer" => "required|String",
                "id_kendaraan" => "required|Integer",
                "tanggal_mulai_sewa" => "required|Date",
                "tanggal_selesai_sewa" => "required|Date",
                "harga_sewa"=> "required|Double",
                "tanggal_buat_order" => "required|Date",
                "tanggal_update_order" => "required|Date"
            ]
        );
        if($validasi -> fails()){
            return response()->json([
            "message" => "Data transaksi belum sesuai",
            "error" => $validasi->errors()
        ], Response::HTTP_NOT_ACCEPTABLE);
        } else {
            $validated = $validasi -> validated();
            try{
                $transaksi = transaksi::create($validated);
                return response()->json([
                    "message" => "Data transaksi berhasil disimpan",
                    "data" => $transaksi
                ], Response::HTTP_OK);
            } catch (Exception $error) {
                return response()->json([
                    "message" => "Data transaksi gagal disimpan",
                    "debug"=> $error -> getMessage()
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
        $transaksi  = transaksi::findOrfail($id);
        return response()->json([
            "message" => "Berhasil mengambil data transaksi dengan id ${id}",
            "data"=> $transaksi
        ], Response::HTTP_OK);
        } catch (Exception $error){
            return response()->json([
                "message" => "Data transaksi gagal ditemukan",
                "debug" => $error->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                "nama_customer" => "required|String",
                "id_kendaraan" => "required|Integer",
                "tanggal_mulai_sewa" => "required|Date",
                "tanggal_selesai_sewa" => "required|Date",
                "harga_sewa" => "required|Double",
                "tanggal_buat_order" => "required|Date",
                "tanggal_update_order" => "required|Date"
            ]
        );

        if ($validasi->fails()) {
            return response()->json([
                "message" => "Data transaksi belum sesuai",
                "error" => $validasi->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        } else {
            $validated = $validasi->validated();
            try {
                $transaksi = transaksi::findOrFail($id);
                $transaksi ->update($validated);
                return response()->json([
                    "message" => "Berhasil mengubah transaksi dengan id {$id}",
                    "error" => $transaksi
                ]);
             } catch(Exception $error){
               return response()->json([
                    "message" => "Gagal mengubah data transaksi",
                    "debug" => $error->getMessage()
               ]);
             }
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $transaksi = transaksi::findOrfail($id);
            $transaksi->delete();
            return response()->json([
                "message" => "Berhasil dihapus data transaksi dengan id ${id}",
                "data" => $transaksi
            ], Response::HTTP_OK);
        } catch (Exception $error) {
            return response()->json([
                "message" => "Data transaksi gagal dihapus",
                "debug" => $error->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}