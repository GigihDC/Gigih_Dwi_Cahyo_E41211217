<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class ApiDokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all();
        return response()->json(['$dokter' => $dokter]);
    }

    public function show($id)
    {
        $dokter = Dokter::find($id);
        if (!$dokter) {
            return response()->json([
                'message' => 'Dokter not found'
            ], 404);
        }
        return response()->json($dokter);
    }

    public function store(Request $request)
    {
        Dokter::create($request->all());
        return response()->json([
            'status' => "ok",
            'message' => 'Dokter berhasil ditambahkan',
        ], 201);
    }

    public function update(Request $request, $id)
    {   
        $dokter = Dokter::find($id);
        $dokter->update($request->all());
        if (!$dokter) {
            return response()->json([
                'message' => 'Dokter not found'
            ], 404);
        }
        return response()->json([
            'status' => "ok",
            'message' => 'Dokter berhasil diubah',
        ], 201);
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        if (!$dokter) {
            return response()->json([
                'message' => 'Dokter not found'
            ], 404);
        }
        $dokter->delete();
        return response()->json([
            'status' => "ok",
            'message' => 'Dokter berhasil dihapus',
        ], 201);
    }
}
