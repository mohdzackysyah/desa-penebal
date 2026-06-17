<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat Domisili - {{ $pengajuan->nama }}</title>
    <style>
        /* Menghilangkan margin agar PDF memenuhi seluruh layar */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: #525659; /* Warna latar belakang standar pembaca PDF */
        }
    </style>
</head>
<body>
    <embed src="data:application/pdf;base64,{{ $pdfBase64 }}" type="application/pdf" width="100%" height="100%" />
</body>
</html>