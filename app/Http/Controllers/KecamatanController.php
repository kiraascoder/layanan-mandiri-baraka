<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\User;
use App\Models\Surat;
use App\Models\Citizen;

class KecamatanController extends Controller
{
    public function dashboard()
    {
        $totalSurat = Surat::count();
        $totalWarga = Citizen::count();
        $totalKelurahan = Kelurahan::count();
        $pendingSurat = Surat::where('status', 'pending')->count();
        $approvedSurat = Surat::where('status', 'selesai')->count();
        $rejectedSurat = Surat::where('status', 'ditolak')->count();

        $recentSurats = Surat::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin-kecamatan.dashboard', compact(
            'totalSurat',
            'totalWarga',
            'totalKelurahan',
            'pendingSurat',
            'approvedSurat',
            'rejectedSurat',
            'recentSurats'
        ));
    }
    public function showKelurahan()
    {
        $users = User::all();
        return view('admin-kecamatan.daftar-kelurahan', compact('users'));
    }
    public function showSuratKeluar()
    {
        $surats = Surat::with(['citizen.kelurahan'])->get();
        $kelurahans = Kelurahan::withCount('surats')->get();

        return view('admin-kecamatan.surat-keluar', compact('surats', 'kelurahans'));
    }
    public function showDetailKelurahan($id)
    {
        $kelurahan = Kelurahan::withCount('citizens', 'surats')->findOrFail($id);
        return view('admin-kecamatan.detail-kelurahan', compact('kelurahan'));
    }
    public function detailSuratKeluar($id)
    {
        $surat = Surat::with('citizen', 'kelurahan')->findOrFail($id);
        return view('admin-kecamatan.detail-surat', compact('surat'));
    }
    public function downloadSurat($id)
    {
        $surat = Surat::findOrFail($id);
        $filePath = storage_path('app/public/' . $surat->surat_selesai);
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }
        return response()->json(['message' => 'Surat tidak ditemukan'], 404);
    }
}
