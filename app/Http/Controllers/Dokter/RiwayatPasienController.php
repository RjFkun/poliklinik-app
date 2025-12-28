<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Periksa;
use Illuminate\Http\Request;

class RiwayatPasienController extends Controller
{
    public function index()
    {
        // ambil semua riwayat periksa (dengan relasi untuk ditampilkan di tabel)
        $riwayatPasien = Periksa::with([
            'daftarPoli.pasien',
            'daftarPoli.jadwalPeriksa.dokter',
            'detailPeriksas.obat'
        ])->orderBy('tgl_periksa', 'desc')->get();

        // tampilkan tabel riwayat
        return view('dokter.riwayat-pasien.index', compact('riwayatPasien'));
    }

    public function show($id)
    {
        // detail 1 periksa + relasi
        $periksa = Periksa::with([
            'daftarPoli.pasien',
            'daftarPoli.jadwalPeriksa.dokter.poli',
            'detailPeriksas.obat'
        ])->findOrFail($id);

        // tampilkan halaman detail
        return view('dokter.riwayat-pasien.show', compact('periksa'));
    }
}
