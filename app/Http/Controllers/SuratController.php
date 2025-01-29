<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    public function create()
    {
        return view('citizens.layanan-surat');
    }

    public function buatSurat()
    {
        return view('surat.buat-surat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:citizens,nik',
            'address' => 'required|string',
            'surat_type' => 'required|string',
        ]);

        $citizen = Citizen::create([
            'name' => $validated['name'],
            'nik' => $validated['nik'],
            'address' => $validated['address'],
        ]);

        Surat::create([
            'citizen_id' => $citizen->id,
            'surat_type' => $validated['surat_type'],
        ]);

        return redirect()->route('surat.index')->with('success', 'Permintaan berhasil dikirim.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'reason' => 'nullable|string|max:255',
        ]);
        $requestModel = Surat::findOrFail($id);
        $requestModel->status = $validated['status'];
        if ($validated['status'] === 'rejected') {
            $requestModel->rejection_reason = $validated['reason'];
        } elseif ($validated['status'] === 'approved') {
            $requestModel->generated_file = $this->generateSurat($requestModel);
        }
        $requestModel->save();
        return redirect()->route('requests.index')->with('success', 'Permintaan diperbarui.');
    }

    private function generateSurat($requestModel)
    {
        $citizen = $requestModel->citizen;
        $template = view('template.surat-test', compact('citizen', 'requestModel'))->render(); // Tambahkan $requestModel
        // Generate PDF
        $pdf = Pdf::loadHTML($template);
        return $pdf->output();
    }


    public function download($id)
    {
        $requestModel = Surat::findOrFail($id);
        if (!$requestModel->generated_file) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
        return response($requestModel->generated_file)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="surat.pdf"');
    }
}
