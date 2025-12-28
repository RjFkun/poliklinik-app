<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PoliController extends Controller
{
    public function get()
    {
        // user login
        $user = Auth::user();
        // master poli + jadwal (relasi dokter->poli)
        $polis = Poli::all();
        $jadwals = JadwalPeriksa::with('dokter', 'dokter.poli')->get();

        return view('pasien.daftar', [
            'user' => $user,
            'polis' => $polis,
            'jadwals' => $jadwals,
        ]);
    }

    public function submit(Request $request)
    {
        // validasi input form daftar poli
        $request->validate([
            'id_poli' => 'required|exists:poli,id',
            'id_jadwal' => 'required|exists:jadwal_periksa,id',
            'keluhan' => 'required|string',
            'id_pasien' => 'required|exists:users,id',
        ]);

        // hitung antrian: jumlah yang sudah daftar di jadwal tsb
        $jumlahSudahDaftar = DaftarPoli::where('id_jadwal', $request->id_jadwal)->count();

        // simpan pendaftaran poli
        $daftar = DaftarPoli::create([
            'id_pasien' => $request->id_pasien,
            'id_jadwal' => $request->id_jadwal,
            'keluhan' => $request->keluhan,
            'no_antrian' => $jumlahSudahDaftar + 1,
        ]);

        // kembali + flash message
        return redirect()->back()
            ->with('message', 'Berhasil mendaftar ke poli!')
            ->with('type', 'success');
    }
}
