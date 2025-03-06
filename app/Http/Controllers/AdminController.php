<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\Citizen;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use App\Models\Saran;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $kelurahanId = Auth::user()->kelurahan_id;
        $totalSuratDiproses = Surat::where('kelurahan_id', $kelurahanId)
            ->whereIn('status', ['pending', 'diproses'])
            ->count();

        $totalSuratSelesai = Surat::where('kelurahan_id', $kelurahanId)
            ->where('status', 'selesai')
            ->count();
        $totalPengguna = Citizen::where('kelurahan_id', $kelurahanId)->count();

        return view('admin.dashboard', compact('totalSuratDiproses', 'totalSuratSelesai', 'totalPengguna'));
    }


    public function create()
    {
        return view('admin.tambah-penduduk');
    }
    public function showDaftarPenduduk()
    {
        $kelurahanId = Auth::user()->kelurahan_id;
        if (!$kelurahanId) {
            return back()->withErrors(['error' => 'Admin tidak memiliki kelurahan yang valid!']);
        }
        $citizens = Citizen::where('kelurahan_id', $kelurahanId)->paginate(10);
        return view('admin.daftar-penduduk', compact('citizens'));
    }



    public function showSurat()
    {
        $kelurahanId = Auth::user()->kelurahan_id;
        $surats = Surat::where('kelurahan_id', $kelurahanId)->paginate(10);
        return view('admin.management-surat', compact('surats'));
    }

    public function showMasukan()
    {
        $kelurahanId = Auth::user()->kelurahan_id; // Dapatkan ID kelurahan dari admin yang login
        $sarans = Saran::whereHas('citizen', function ($query) use ($kelurahanId) {
            $query->where('kelurahan_id', $kelurahanId);
        })->get();

        return view('admin.masukan', compact('sarans'));
    }



    public function edit($nik)
    {
        $citizen = Citizen::where('nik', $nik)->firstOrFail();
        return view('admin.edit-penduduk', compact('citizen'));
    }

    public function storeCitizen(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:citizens,nik',
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'golongan_darah' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',

        ]);
        $kelurahanId = Auth::user()->kelurahan_id;
        Citizen::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'golongan_darah' => $request->golongan_darah,
            'password' => Hash::make($request->password),
            'kelurahan_id' => $kelurahanId,
        ]);

        return redirect()->route('admin.daftar-penduduk')->with('success', 'Warga berhasil ditambahkan!');
    }
    public function update(Request $request, $nik)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'nik' => 'required|numeric|:citizens,nik,' . $nik,  // Ensuring NIK is unique except for the current one
            'name' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'golongan_darah' => 'required|string',
        ]);
        $kelurahanId = Auth::user()->kelurahan_id;
        $citizen = Citizen::where('nik', $nik)->firstOrFail();
        $citizen->update([
            'nik' => $validated['nik'],
            'name' => $validated['name'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'agama' => $validated['agama'],
            'status_perkawinan' => $validated['status_perkawinan'],
            'pekerjaan' => $validated['pekerjaan'],
            'kewarganegaraan' => $validated['kewarganegaraan'],
            'golongan_darah' => $validated['golongan_darah'],
            'kelurahan_id' => $kelurahanId,
        ]);
        return redirect()->route('admin.daftar-penduduk')->with('success', 'Data penduduk berhasil diperbarui.');
    }



    public function destroy($nik)
    {
        $citizen = Citizen::where('nik', $nik)->first();
        if ($citizen) {
            $citizen->delete();
            return redirect()->route('admin.daftar-penduduk')->with('success', 'Penduduk berhasil dihapus.');
        }
        return redirect()->route('admin.daftar-penduduk')->with('error', 'Penduduk tidak ditemukan.');
    }
    public function showDetail($id)
    {
        $surat = Surat::with('citizen')->findOrFail($id);
        return view('admin.detail-surat', compact('surat'));
    }

    public function generateSurat($id)
    {
        $surat = Surat::with('citizen')->findOrFail($id);
        $template = 'templates.' . $surat->jenis_surat;
        $data_surat = json_decode($surat->data_surat);
        if (!view()->exists($template)) {
            return abort(404, 'Template tidak ditemukan: ' . $template);
        }

        // Generate PDF
        $pdf = Pdf::loadView($template, [
            'citizen' => $surat->citizen,
            'requestModel' => $surat,
            'data_surat' => $data_surat
        ])->setPaper('legal', 'portrait');


        // Download PDF
        return $pdf->download('Surat_' . ucfirst(str_replace('_', '', $surat->jenis_surat)) . '.pdf');
    }

    public function updateStatus(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        // Pastikan status yang dikirim ada dalam ENUM
        $statusValid = ['pending', 'diproses', 'selesai', 'ditolak'];
        if (!in_array($request->status, $statusValid)) {
            return back()->with('error', 'Status tidak valid.');
        }

        $surat->status = $request->status;
        if ($request->status == 'ditolak') {
            $surat->alasan_reject = $request->alasan_reject ?? 'Tidak ada alasan diberikan';
        } else {
            $surat->alasan_reject = null;
        }

        $surat->save();

        return redirect()->route('admin.management-surat')->with('success', 'Status surat berhasil diperbarui.');
    }
    public function uploadSurat(Request $request, $id)
    {
        $request->validate([
            'surat_selesai' => 'required|mimes:pdf|max:2048',
        ]);
        $surat = Surat::findOrFail($id);
        if ($request->hasFile('surat_selesai')) {
            $filePath = $request->file('surat_selesai')->store('surat_selesai', 'public');
            $surat->update([
                'surat_selesai' => $filePath,
            ]);
        }
        return redirect()->back()->with('success', 'Surat berhasil diupload.');
    }

    public function updateNoSurat($id, Request $request)
    {

        $request->validate(
            [
                'no_surat' => 'required|unique:surats,no_surat,' . $id,
            ],
            [
                'no_surat.required' => 'Nomor Surat Tidak Boleh Kosong',
                'no_surat.unique' => 'Nomor Surat Sudah Ada'
            ]
        );

        $surat = Surat::findOrFail($id);
        $surat->no_surat = $request->no_surat;



        $surat->save();
        return redirect()->back()->with('success', 'Nomor surat berhasil diperbarui.');
    }
}
