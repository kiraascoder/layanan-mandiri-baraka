<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

    public function detailCitizenSurat($id)
    {
        $surat = Surat::with('citizen')
            ->where('citizen_id', auth()->user()->id)
            ->where('id', $id)
            ->firstOrFail();
        return view('citizens.detail-surat', compact('surat'));
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
            'data_surat' => 'required|array',
            'file_persyaratan' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Pengguna belum login'], 401);
        }
        $citizen = Citizen::where('nik', $user->nik)->first();

        switch ($request->surat_type) {
            case 'pindah_domisili':
                $request->validate([
                    'data_surat.alamat_asal' => 'required|string',
                    'data_surat.alamat_tujuan' => 'required|string',
                    'data_surat.alasan_pindah' => 'required|string',
                    'data_surat.jumlah_anggota' => 'required|integer|min:1',
                ]);
                break;
            case 'izin_usaha':
                $request->validate([
                    'data_surat.nama_usaha' => 'required|string',
                    'data_surat.alamat_usaha' => 'required|string',
                    'data_surat.jenis_usaha' => 'required|string',
                    'data_surat.modal' => 'required|integer|min:0',
                ]);
                break;
            case 'kelahiran':
                $request->validate([
                    'data_surat.nama_bayi' => 'required|string',
                    'data_surat.tanggal_lahir' => 'required|date',
                    'data_surat.jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'data_surat.nama_ayah' => 'required|string',
                    'data_surat.nama_ibu' => 'required|string',
                ]);
                break;
            case 'kematian':
                $request->validate([
                    'data_surat.nama_almarhum' => 'required|string',
                    'data_surat.tanggal_meninggal' => 'required|date',
                    'data_surat.sebab_meninggal' => 'required|string',
                    'data_surat.tempat_meninggal' => 'required|string',
                ]);
                break;
            case 'jaminan_kesehatan':
                $request->validate([
                    'data_surat.nama_pemohon' => 'required|string',
                    'data_surat.nik' => 'required|digits:16',
                    'data_surat.alamat' => 'required|string',
                    'data_surat.keterangan_kesehatan' => 'required|string',
                ]);
                break;
        }

        $kelurahanId = Auth::user()->kelurahan_id;
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
            'data_surat' => json_encode($request->data_surat),
            'status' => 'pending',
            'kelurahan_id' => $kelurahanId,
        ]);

        return redirect('/layanan-surat')->with('success', 'Permohonan berhasil diajukan.');
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
