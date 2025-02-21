@php
    $bulanRomawi = [
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
        5 => 'V',
        6 => 'VI',
        7 => 'VII',
        8 => 'VIII',
        9 => 'IX',
        10 => 'X',
        11 => 'XI',
        12 => 'XII',
    ];
    $tanggalSekarang = date('d'); // Ambil tanggal sekarang (01-31)
    $bulanSekarang = date('n'); // Ambil bulan sekarang (1-12)
    $tahunSekarang = date('Y'); // Ambil tahun sekarang (2024, dst)
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili</title>
    <style>
        @font-face {
            font-family: 'TimesNewRoman';
            src: url('storage/fonts/TimesNewRoman-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'TimesNewRoman', serif;
            margin: 0;
            padding: 20px;
        }

        .kop-border {
            border-bottom: 5px double black;
            margin-top: 5px;
            width: 100%;
        }

        .header {
            text-align: center;
            line-height: 1;
        }

        .header img {
            width: 2.06cm;
            height: 1.83cm;
            margin-bottom: 10px;
        }

        .kop-surat {
            font-size: 16pt;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0;
        }

        .alamat {
            font-size: 12pt;
            line-height: 1;
            margin: 0;
            font-style: italic;
        }

        .alamat .kode-pos {
            font-weight: bold;
        }

        .alamat-email {
            font-size: 12pt;
            line-height: 1;
            font-weight: bold;
            margin: 0;
        }

        .content {
            margin-top: 20px;
            font-size: 12pt;
            line-height: 1.5;
        }

        .identitas {
            width: 100%;
            border-collapse: collapse;
        }

        .container-table {
            margin-left: 100px;
        }

        .identitas td {
            padding: 3px 10px;
            vertical-align: top;
        }

        .identitas td:first-child {
            width: 180px;
        }

        .identitas td:nth-child(2) {
            width: 10px;
            text-align: center;
        }

        .signature-section {
            margin-top: 40px;
            text-align: right;
            font-size: 12pt;
        }

        .signature {
            margin-top: 50px;
            text-decoration: underline;
            font-weight: bold;
        }

        .content p {
            text-indent: 50px;
        }

        .content p:first-of-type {
            text-indent: 0px;
        }
    </style>
</head>

<body>
    <!-- Kop Surat dengan Logo -->
    <div class="header">
        <img src="{{ public_path('img/logo/logo.png') }}" alt="Logo Pemerintah">
        <p class="kop-surat">PEMERINTAH KABUPATEN ENREKANG</p>
        <p class="kop-surat">KECAMATAN BARAKA</p>
        <p class="kop-surat">KELURAHAN TOMENAWA</p>
        <p class="alamat">Jl. Poros Baraka – Pasui <span class="kode-pos">Kode Pos 91753</span></p>
        <p class="alamat-email">Email: kelurahan.tomenawa@yahoo.co.id</p>
    </div>
    <div class="kop-border"></div>
    <!-- Judul Surat -->
    <div class="content" style="text-align: center; font-weight: bold; text-decoration: underline;">
        SURAT KETERANGAN DOMISILI
    </div>

    <div style="text-align: center;">
        Nomor:
        {{ $requestModel->no_surat ?? 'Belum ada nomor surat' }}/{{ $tanggalSekarang }}/KLT/{{ $bulanRomawi[$bulanSekarang] }}/{{ $tahunSekarang }}
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p style="text-align: justify">Yang bertanda tangan dibawah ini Kepala Kelurahan Tomenawa, dengan ini
            menerangkan bahwa : </p>
        <table class="identitas container-table">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $data_surat->nama }}</td>
            </tr>
            <tr>
                <td>Tempat /Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $data_surat->tempat_lahir }}, {{ $data_surat->tanggal_lahir }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $data_surat->nik }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $data_surat->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $data_surat->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $data_surat->alamat }}, Kel. Tomenawa, Kec. Baraka</td>
            </tr>
        </table>

        <p style="text-align: justify">Benar-benar berdomisili di Lingkungan {{ $data_surat->alamat }}, Kel. Tomenawa,
            Kec. Baraka, Kabupaten
            Enrekang.</p>
        <p style="text-align: justify">Demikian surat keterangan domisili ini kami buat dengan sebenarnya dan
            selanjutnya untuk dipergunakan
            sebagaimana mestinya.</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="signature-section">
        <p>Rumbo, {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</p>
        <p>LURAH TOMENAWA</p>
        <p class="signature">DAHLAN RENDEN, S.Pd</p>
        <p>NIP. 19720101 200604 1 009</p>
    </div>
</body>

</html>
