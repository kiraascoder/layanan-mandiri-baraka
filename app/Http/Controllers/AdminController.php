<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\Citizen;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function index()
    {

        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.tambah-penduduk');
    }

    public function showDaftarPenduduk()
    {
        $citizens = Citizen::all();
        return view('admin.daftar-penduduk', compact('citizens'));
    }

    public function showSurat()
    {
        $requests = Surat::with('citizen')->get();
        return view('admin.management-surat', compact('requests'));
    }

    public function showMasukan()
    {
        return view('admin.masukan');
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
        ]);

        return redirect()->route('admin.daftar-penduduk')->with('success', 'Citizen successfully created.');
    }
    public function update(Request $request, Citizen $citizen)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'golongan_darah' => 'nullable|string',
        ]);

        $citizen->update($request->only([
            'name',
            'tanggal_lahir',
            'tempat_lahir',
            'jenis_kelamin',
            'alamat',
            'agama',
            'status_perkawinan',
            'pekerjaan',
            'kewarganegaraan',
            'golongan_darah',
        ]));
        return redirect()->route('admin.daftar-penduduk')->with('success', 'Citizen successfully updated.');
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
}
