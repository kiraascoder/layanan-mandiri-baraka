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

    public function ketDomisiliView()
    {
        return view('surat.ket_domisili');
    }

    public function ketTidakMampuView()
    {
        return view('surat.ket_tidak_mampu');
    }

    public function ketUsahaView()
    {
        return view('surat.ket_usaha');
    }

    public function penghasilanOrtuView()
    {
        return view('surat.penghasilan_ortu');
    }

    public function pernahMenikahView()
    {
        return view('surat.pernah_menikah');
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
            'jenis_surat' => 'required|in:ket_domisili,ket_tidak_mampu,ket_usaha,penghasilan_ortu,pernah_menikah',
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
            case 'penghasilan_ortu':
                $request->validate([
                    'data_surat.nama_anak' => 'required|string',
                    'data_surat.tempat_lahir' => 'required|string',
                    'data_surat.tanggal_lahir' => 'required|date',
                    'data_surat.nik' => 'required|string',
                    'data_surat.jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'data_surat.pekerjaan' => 'required|string',
                    'data_surat.alamat' => 'required|string',
                    'data_surat.nama_ayah' => 'required|string',
                    'data_surat.umur' => 'required|integer|min:0',
                    'data_surat.pekerjaan_ortu' => 'required|string',
                    'data_surat.alamat_ortu' => 'required|string',
                    'data_surat.penghasilan_ortu' => 'required|integer|min:0',
                ]);
                break;
            case 'pernah_menikah':
                $request->validate([
                    'data_surat.nama_suami' => 'required|string',
                    'data_surat.tanggal_lahir_suami' => 'required|date',
                    'data_surat.tempat_lahir_suami' => 'required|string',
                    'data_surat.nama_istri' => 'required|string',
                    'data_surat.tanggal_lahir_istri' => 'required|date',
                    'data_surat.tempat_lahir_istri' => 'required|string',
                    'data_surat.alamat' => 'required|string',
                    'data_surat.no_kk' => 'required|string',
                ]);
                break;
            case 'ket_usaha':
                $request->validate([
                    'data_surat.nama' => 'required|string',
                    'data_surat.tempat_lahir' => 'required|string',
                    'data_surat.tanggal_lahir' => 'required|date',
                    'data_surat.nik' => 'required|string',
                    'data_surat.jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'data_surat.pekerjaan' => 'required|string',
                    'data_surat.alamat' => 'required|string',
                    'data_surat.nama_usaha' => 'required|string',
                ]);
                break;
            case 'ket_domisili':
                $request->validate([
                    'data_surat.nama' => 'required|string',
                    'data_surat.tempat_lahir' => 'required|string',
                    'data_surat.tanggal_lahir' => 'required|date',
                    'data_surat.nik' => 'required|string',
                    'data_surat.pekerjaan' => 'required|string',
                    'data_surat.jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'data_surat.alamat' => 'required|string',
                ]);
                break;
            case 'ket_tidak_mampu':
                $request->validate([
                    'data_surat.nama_anak' => 'required|string',
                    'data_surat.tempat_lahir' => 'required|string',
                    'data_surat.tanggal_lahir' => 'required|date',
                    'data_surat.nik' => 'required|digits:16',
                    'data_surat.jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'data_surat.pekerjaan' => 'required|string',
                    'data_surat.alamat' => 'required|string',
                    'data_surat.nama_ayah' => 'required|string',
                    'data_surat.umur' => 'required|integer|min:0',
                    'data_surat.pekerjaan_ortu' => 'required|string',
                    'data_surat.alamat_ortu' => 'required|string',
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
