<?php

namespace App\Http\Controllers;

use App\Models\kendaraan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class controller_kendaraan extends Controller
{
    // Show All Vehicle
    public function index()
    {
        try{
            $kendaraan = kendaraan::all();
            return response()->json([
                'code' => Response::HTTP_OK,
                'message'=> 'Berhasil mengambil data semua kendaraan',
                'data'=> $kendaraan
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    // Insert data Vehicle
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'plat_kendaraan'=> 'required|string',
            'nama_kendaraan'=> 'required|string',
        ]);

        if($validate->fails()){
            return response()->json([
                'message'=> $validate->errors()->first(),
            ]);
        }
        else{
            $validated = $validate->validated();
            try{
                $insertKendaraan = kendaraan::create($validated);
                return response()->json([
                    'code'=> Response::HTTP_CREATED,
                    'message'=> 'Berhasil menambahkan data kendaraan'
                ]);
            }catch(Exception $e){
                return response()->json([
                    'message'=> $e->getMessage()
                ]);
            }
        }
    }

    // Show current data Vehicle by id
    public function show(string $id_kendaraan)
    {
        try{
            $cariKendaraan = kendaraan::findOrFail($id_kendaraan);

            return response()->json([
                'code'=> Response::HTTP_OK,
                'message'=> "Berhasil mengambil data kendaraan dengan idkendaraan $id_kendaraan",
                'data'=> $cariKendaraan
            ]);
        }catch(Exception $e){
            return response()->json([
                'message'=> $e->getMessage()
            ]);
        }
    }

    // Update current data Vehicle by id
    public function update(Request $request, string $id)
    {
        $updateKendaraan = kendaraan::findOrFail($id);

        if(!$updateKendaraan){
            return response()->json([
                'message'=> 'Data kendaraan tidak ditemukan !'
            ]);
        }
        else{
            $validate = Validator::make($request->all(), [
                'plat_kendaraan'=> 'string',
                'nama_kendaraan'=> 'string',
            ]);

            if($validate->fails()){
                return response()->json([
                    'message'=> $validate->errors()->first(),
                ]);
            }
            else{
                try{
                    if($request->filled('plat_kendaraan')){
                        $updateKendaraan->plat_kendaraan = $request->plat_kendaraan;
                    }

                    if($request->filled('nama_kendaraan')){
                        $updateKendaraan->nama_kendaraan = $request->nama_kendaraan;
                    }

                    $updateKendaraan->save();

                    return response()->json([
                        'code' => Response::HTTP_OK,
                        'message'=> "Berhasil mengubah data kendaraan dengan id $id",
                        'data' => $updateKendaraan
                    ]);
                }
                catch(Exception $e){
                    return response()->json([
                        'message'=> $e->getMessage()
                    ]);
                }
            }
        }
    }

    // Delete current data Vehicle by id
    public function destroy(string $id)
    {
        try{
            $cariKendaraan = kendaraan::findOrFail($id);
            $cariKendaraan->delete();
            return response()->json([
                'code'=> Response::HTTP_OK,
                'message'=> "Berhasil menghapus data kendaraan dengan id $id"
            ]);
        }catch(Exception $e){
            return response()->json([
                'message'=> $e->getMessage()
            ]);
        }
    }
}
