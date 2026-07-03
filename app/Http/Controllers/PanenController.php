<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen; 
use App\Http\Requests\StoreHasilPanenRequest;
use App\Http\Resources\HasilPanenResource;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PanenController extends Controller
{
    // =========================================================================
    // BAGIAN PRAKTIKUM
    // =========================================================================

    // 1. GET ALL + Filtering & Pagination
    public function index(Request $request)
    {
        $query = HasilPanen::query();

        // Fitur Filtering berdasarkan nama komoditas
        if ($request->has('commodity')) {
            $query->where('commodity_name', 'like', '%' . $request->commodity . '%');
        }

        // Fitur Pagination (Default 10 data per halaman)
        $harvests = $query->paginate(10);

        // Mengembalikan data menggunakan Resource Collection 
        return HasilPanenResource::collection($harvests);
    }

    // 2. POST (Create) + Form Request Validation
    public function store(StoreHasilPanenRequest $request)
    {
        // Menyimpan data yang sudah divalidasi ke database
        $harvest = HasilPanen::create($request->validated());

        // Mengembalikan respon sukses menggunakan Resource
        return (new HasilPanenResource($harvest))
            ->additional(['message' => 'Data panen berhasil dicatat'])
            ->response()
            ->setStatusCode(201); // 201 Created
    }

    // 3. GET BY ID + Error Handling Manual
    public function show($id)
    {
        try {
            // Mencari data berdasarkan ID
            $harvest = HasilPanen::findOrFail($id);
            return new HasilPanenResource($harvest);

        } catch (ModelNotFoundException $e) {
            // Error Handling jika ID tidak ada di sistem
            return response()->json([
                'error' => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak ada di sistem.'
            ], 404);
        }
    }


    // =========================================================================
    // BAGIAN TUGAS MANDIRI
    // =========================================================================

    // 4. PUT/PATCH (Update) + Form Request Validation + Error Handling
    public function update(StoreHasilPanenRequest $request, $id)
    {
        try {
            // Mencari data berdasarkan ID yang dikirimkan[cite: 1]
            $panen = HasilPanen::findOrFail($id);
            
            // Memperbarui data di database menggunakan data yang lolos validasi[cite: 1]
            $panen->update($request->validated());
            
            // Mengembalikan respon objek HasilPanenResource[cite: 1]
            return (new HasilPanenResource($panen))
                ->additional(['message' => 'Data panen berhasil diperbarui'])
                ->response()
                ->setStatusCode(200);

        } catch (ModelNotFoundException $e) {
            // Menangkap eksepsi jika ID tidak terdaftar[cite: 1]
            return response()->json([
                'error' => 'Resource tidak ditemukan',
                'message' => 'Data panen dengan ID ' . $id . ' tidak terdaftar di sistem.'
            ], 404); // 404 Not Found[cite: 1]
        }
    }

    // 5. DELETE (Hapus Data) + Error Handling Manual
    public function destroy($id)
    {
        try {
            // Mencari data berdasarkan ID[cite: 1]
            $panen = HasilPanen::findOrFail($id);
            
            // Menghapus data dari database[cite: 1]
            $panen->delete();
            
            // Mengembalikan respon JSON konfirmasi sukses[cite: 1]
            return response()->json([
                'message' => 'Data panen berhasil dihapus secara permanen dari sistem.'
            ], 200); // 200 OK[cite: 1]

        } catch (ModelNotFoundException $e) {
            // Menangkap eksepsi dan mengembalikan respon error 404[cite: 1]
            return response()->json([
                'error' => 'Resource tidak ditemukan',
                'message' => 'Gagal menghapus. Data panen dengan ID ' . $id . ' tidak ditemukan.'
            ], 404);
        }
    }
}