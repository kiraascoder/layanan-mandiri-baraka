<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function create()
    {
        $surats = Surat::with('citizen')
            ->where('citizen_id', auth()->user()->id)
            ->get();
        return view('citizens.layanan-surat', compact('surats'));
    }

    public function buatSurat()
    {
        return view('surat.buat-surat');
    }

    public function izinUsahaView()
    {
        return view('surat.izin-usaha');
    }

    public function kelahiranView()
    {
        return view('surat.kelahiran');
    }

    public function kematianView()
    {
        return view('surat.kematian');
    }

    public function pindahDomisiliView()
    {
        return view('surat.pindah-domisili');
    }

    public function jaminanKesehatanView()
    {
        return view('surat.jaminan-kesehatan');
    }

    public function index()
    {
        $surats = Surat::with('citizen')->get();
        return view('admin.management-surat', compact('surats'));
    }

    public function approve($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->status = 'selesai';
        $surat->save();
        return redirect()->back()->with('success', 'Surat disetujui');
    }

    public function reject(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->status = 'reject';
        $surat->alasan_reject = $request->alasan_reject;
        $surat->save();

        return redirect()->back()->with('success', 'Surat ditolak');
    }

    public function upload(Request $request)
    {
        $request->validate([

            'jenis_surat' => 'required|in:izin_usaha,kelahiran,kematian,pindah_domisili,jaminan_kesehatan',
            'no_hp' => 'required|digits:12',
        ]);
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Pengguna belum login'], 401);
        }

        $citizen = Citizen::where('nik', $user->nik)->first();
        switch ($request->jenis_surat) {
            case 'pindah_domisili':
                $request->validate([
                    'ktp_pemohon' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'fotokopi_kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_pengantar_rt_rw' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                ]);
                break;
            case 'izin_usaha':
                $request->validate([
                    'ktp_pemohon' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'fotokopi_kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_pengantar_rt_rw' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_pernyataan_usaha' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'foto_lokasi_usaha' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                ]);
                break;
            case 'kelahiran':
                $request->validate([
                    'ktp_orang_tua' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'kk_orang_tua' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_keterangan_kelahiran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_pengantar_rt_rw' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'buku_nikah_orang_tua' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                ]);
                break;
            case 'kematian':
                $request->validate([
                    'ktp_almarhum' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'fotokopi_kk' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_keterangan_kematian' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_pengantar_rt_rw' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'ktp_ahli_waris' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                ]);
                break;
            case 'jaminan_kesehatan':
                $request->validate([
                    'ktp_pemohon' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'dokumen_pendukung' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                    'surat_pengantar_rt_rw' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                ]);
                break;
        }

        $files = [];
        foreach ($request->allFiles() as $key => $file) {
            $path = $file->store("persyaratan/{$request->jenis_surat}", 'public');
            $files[$key] = asset("storage/$path");
        }

        $permohonan = Surat::create([
            'citizen_id' => $citizen->id,
            'jenis_surat' => $request->jenis_surat,
            'no_hp' => $request->no_hp,
            'file_persyaratan' => json_encode($files),
            'status' => 'pending',
        ]);

        return redirect('/layanan-surat')->with('success', 'Permohonan berhasil diajukan.');
    }

    public function downloadSurat($id)
    {
        $surat = Surat::findOrFail($id);

        if ($surat->file_surat && Storage::exists('public/' . $surat->file_surat)) {
            return Storage::download('public/' . $surat->file_surat);
        }

        return redirect()->back()->with('error', 'File tidak ditemukan');
    }
    
}
