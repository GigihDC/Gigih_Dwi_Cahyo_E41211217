<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    // untuk mengambil data
    public function index()
    {
        $dokter = DB::table('daftar_dokter')->get();
        return view('backend.dokter.index', compact('dokter'));
    }
    
    // untuk menambah data
    public function create()
    {
        $dokter = null;
        return view('backend.dokter.create', compact('dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
        ]);

        DB::table('daftar_dokter')->insert([
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter baru telah berhasil disimpan.');
    }
    
    // untuk menghapus data
    public function destroy($id)
    {
        DB::table('daftar_dokter')->where('id', $id)->delete();

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter telah berhasil dihapus.');
    }
    
    //untuk mengupdate data
    public function edit($id)
    {
        $pengalaman_kerja = DB::table('daftar_dokter')->where('id', $id)->first();
        
        return view('backend.dokter.edit', compact('pengalaman_kerja'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis' => 'required',
            'tahun_masuk' => 'required',
            'tahun_keluar' => 'required',
        ]);

        DB::table('daftar_dokter')->where('id', $id)->update([
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
        ]);

        return redirect()->route('dokter.index')
            ->with('success', 'Data dokter telah berhasil diupdate.');
    }
}
