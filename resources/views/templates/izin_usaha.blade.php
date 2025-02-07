<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Izin Usaha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header .logo {
            width: 100px;
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
            text-align: right;
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
        <img src="{{ public_path('images/logo.png') }}" alt="Logo" class="logo">
        <div class="kop-surat">
            <p>PEMERINTAH DESA XYZ</p>
            <p>Kecamatan ABC</p>
            <p>Jalan XYZ No. 123, Kabupaten DEF</p>
        </div>
    </div>

    <!-- Content Surat -->
    <div class="content">
        <p><strong>Nama Pemohon:</strong> {{ $citizen->name }}</p>
        <p><strong>NIK:</strong> {{ $citizen->nik }}</p>


        <!-- Accessing data_surat as object -->
        <p><strong>Nama Usaha:</strong> {{ $data_surat->nama_usaha }}</p>
        <p><strong>Alamat Usaha:</strong> {{ $data_surat->alamat_usaha }}</p>
        <p><strong>Jenis Usaha:</strong> {{ $data_surat->jenis_usaha }}</p>
        <p><strong>Modal Usaha:</strong> Rp {{ number_format($data_surat->modal, 0, ',', '.') }}</p>

        <p>Dengan ini, Pemerintah Desa XYZ memberikan <strong>Surat Keterangan Izin Usaha</strong> kepada
            saudara/saudari <strong>{{ $citizen->name }}</strong> untuk menjalankan usaha di bidang
            <strong>{{ $data_surat->jenis_usaha }}</strong> yang berlokasi di {{ $data_surat->alamat_usaha }}.
        </p>

        <p>Surat ini diberikan untuk digunakan sebagaimana mestinya.</p>
        <p>Tempat, Tanggal: {{ now()->translatedFormat('d F Y') }}</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="signature-section">
        <p>Hormat kami,</p>
        <p class="signature">Admin Desa</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Kontak: 0123456789 | Email: desa@example.com</p>
    </div>
</body>

</html>
