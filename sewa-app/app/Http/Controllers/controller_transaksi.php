<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class controller_transaksi extends Controller
{
    public function getData()
    {
        $data = transaksi::all();

        return response()->json($data);
    }
    public function addData()
    {
        return view('add_transaksi');
    }
    public function editData($id_transaksi)
    {
        $data = transaksi::findOrFail($id_transaksi);
        return view('edit_transaksi', compact('data'));
    }
    public function deleteData($id_transaksi)
    {
        transaksi::findOrFail($id_transaksi)->delete();
        return redirect()->route('app')->with('Success', 'Data transaksi berhasil di hapus');
    }

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
         $validatedData = $request->validate([
            'nama_customer' => 'required|string|max:255',
            'tanggal_mulai_sewa' => 'required|date',
            'tanggal_selesai_sewa' => 'required|date|after:tanggal_mulai_sewa',
            'harga_sewa' => 'required|numeric',
            'id_kendaraan' => 'required'
        ]);
        transaksi::create($validatedData);
        return redirect()->route('app')->with('Success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
        $transaksi  = transaksi::findOrfail($id);
        return response()->json([
            "message" => "Berhasil mengambil data transaksi dengan id $id",
            "data"=> $transaksi
        ], Response::HTTP_OK);
        } catch (Exception $error){
            return response()->json([
                "message" => "Data transaksi gagal ditemukan",
                "error" => $error->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_transaksi)
    {
        $transaksi = transaksi::findOrFail($id_transaksi);

        if ($transaksi) {
            $validate = Validator::make($request->all(), [
                'nama_customer' => 'string',
                'tanggal_mulai_sewa' => 'date',
                'tanggal_selesai_sewa' => 'date',
                'harga_sewa' => 'integer',
                'id_kendaraan' => 'string',
            ]);

            if ($validate->fails()) {
                return redirect()->back()->with('error', $validate->errors()->first());
            } else {
                try {
                    if ($request->filled('nama_customer')) {
                        $transaksi->nama_customer = $request->nama_customer;
                    }
                    if ($request->filled('tanggal_mulai_sewa')) {
                        $transaksi->tanggal_mulai_sewa = $request->tanggal_mulai_sewa;
                    }
                    if ($request->filled('tanggal_selesai_sewa')) {
                        $transaksi->tanggal_selesai_sewa = $request->tanggal_selesai_sewa;
                    }
                    if ($request->filled('harga_sewa')) {
                        $transaksi->harga_sewa = $request->harga_sewa;
                    }
                    if ($request->filled('id_kendaraan')) {
                        $transaksi->id_kendaraan = $request->id_kendaraan;
                    }

                    $transaksi->update();

                    return redirect()->route('app')->with('success', 'Successfully edit data');
                } catch (Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
        } else {
            return redirect()->back()->with('error', "Update Failed !");
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
                "message" => "Berhasil dihapus data transaksi dengan id $id",
                "data" => $transaksi
            ], Response::HTTP_OK);
        } catch (Exception $error) {
            return response()->json([
                "message" => "Data transaksi gagal dihapus",
                "error" => $error->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
