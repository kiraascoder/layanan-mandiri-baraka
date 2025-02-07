<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Persetujuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header .logo {
            width: 100px;
            /* Adjust the size of the logo */
        }

        .header .kop-surat {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .content {
            margin: 20px;
        }

        .content p {
            font-size: 14px;
        }

        .signature-section {
            margin-top: 40px;
            text-align: center;
        }

        .signature {
            margin-top: 50px;
            text-decoration: underline;
            font-weight: bold;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <!-- Kop Surat with Logo -->
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo" class="logo"> <!-- Update the logo path -->
        <div class="kop-surat">
            <p>PEMERINTAH DESA XYZ</p>
            <p>Kecamatan ABC</p>
            <p>Jalan XYZ No. 123, Kabupaten DEF</p>
        </div>
    </div>

    <!-- Content Surat -->
    <div class="content">
        <p><strong>Nama:</strong> {{ $citizen->name }}</p>
        <p><strong>NIK:</strong> {{ $citizen->nik }}</p>
        <p><strong>Alamat:</strong> {{ $citizen->address }}</p>

        <p>Dengan ini kami menyatakan bahwa permintaan surat jenis <strong>{{ $requestModel->surat_type }}</strong> yang
            diajukan oleh saudara/saudari telah disetujui.</p>

        <p>Demikian surat ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</p>

        <p>Tempat, Tanggal: {{ now()->format('d F Y') }}</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="signature-section">
        <p class="signature">Admin Desa</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Kontak: 0123456789 | Email: desa@example.com</p>
    </div>

</body>

</html>
