<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Domisili - {{ $pengajuan->nama }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 1cm;
            font-size: 12pt;
            line-height: 1.5;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-surat h1, .kop-surat h2, .kop-surat h3 {
            margin: 0;
            padding: 0;
        }
        .kop-surat h1 { font-size: 14pt; font-weight: bold; }
        .kop-surat h2 { font-size: 16pt; font-weight: bold; }
        .kop-surat p { font-size: 11pt; margin-top: 5px; }
        .garis-kop {
            border-bottom: 3px solid black;
            margin-top: 10px;
            margin-bottom: 2px;
        }
        .garis-kop-tipis {
            border-bottom: 1px solid black;
            margin-bottom: 20px;
        }
        .judul-surat {
            text-align: center;
            margin-bottom: 20px;
        }
        .judul-surat h3 {
            margin: 0;
            text-decoration: underline;
            font-size: 14pt;
        }
        .judul-surat p {
            margin: 0;
        }
        .isi-surat {
            text-align: justify;
        }
        .tabel-data {
            width: 100%;
            margin-left: 30px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .tabel-data td {
            padding: 3px 0;
            vertical-align: top;
        }
        .tabel-data td:first-child {
            width: 200px;
        }
        .tabel-data td:nth-child(2) {
            width: 15px;
        }
        .tanda-tangan {
            width: 300px;
            float: right;
            text-align: center;
            margin-top: 50px;
        }
        .nama-kades {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <h1>PEMERINTAH KABUPATEN {{ strtoupper($pengajuan->kabupaten) }}</h1>
        <h2>KECAMATAN {{ strtoupper($pengajuan->kecamatan) }}</h2>
        <h2>DESA PENEBAL</h2>
        <p>Jl. Utama Desa Penebal RT.001/RW.001 Kode Pos 28711</p>
    </div>
    <div class="garis-kop"></div>
    <div class="garis-kop-tipis"></div>

    <div class="judul-surat">
        <h3>SURAT KETERANGAN DOMISILI</h3>
        <p>Nomor: 470 / &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; / SKD / {{ date('Y') }}</p>
    </div>

    <div class="isi-surat">
        <p>Yang bertanda tangan di bawah ini Kepala Desa Penebal, Kecamatan {{ $pengajuan->kecamatan }}, Kabupaten {{ $pengajuan->kabupaten }}, dengan sesungguhnya menerangkan bahwa:</p>

        <table class="tabel-data">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $pengajuan->nik }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><strong>{{ $pengajuan->nama }}</strong></td>
            </tr>
            <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $pengajuan->tempat_lahir }}, {{ \Carbon\Carbon::parse($pengajuan->tanggal_lahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $pengajuan->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $pengajuan->agama }}</td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td>{{ $pengajuan->status_perkawinan }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $pengajuan->pekerjaan }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $pengajuan->alamat }}</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>{{ $pengajuan->kecamatan }}</td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td>:</td>
                <td>{{ $pengajuan->kabupaten }}</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td>{{ $pengajuan->provinsi }}</td>
            </tr>
        </table>

        <p>Dengan ini menerangkan bahwa nama tersebut di atas benar berdomisili di Desa Penebal, Kecamatan {{ $pengajuan->kecamatan }}, Kabupaten {{ $pengajuan->kabupaten }}, Provinsi {{ $pengajuan->provinsi }}.</p>

        <p>Demikian Surat Keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="tanda-tangan">
        <p>Penebal, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>Kepala Desa Penebal</p>
        <div class="nama-kades">
            ( NAMA KEPALA DESA )
        </div>
    </div>

</body>
</html>