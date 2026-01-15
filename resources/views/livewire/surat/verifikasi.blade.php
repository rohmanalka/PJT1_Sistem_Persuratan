<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 40px;
        }

        .card {
            background: white;
            max-width: 500px;
            margin: auto;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .item {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }

        .status {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background: #dcfce7;
            color: #166534;
            border-radius: 6px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Verifikasi Surat</h2>

        <div class="item">
            <span class="label">Nomor Surat:</span>
            {{ $surat->nomor_surat }}
        </div>

        <div class="item">
            <span class="label">Jenis Surat:</span>
            {{ $surat->jenisSurat->nama ?? '-' }}
        </div>

        <div class="item">
            <span class="label">Disetujui oleh:</span>
            {{ $surat->approver->nama ?? '-' }}
        </div>

        <div class="item">
            <span class="label">Jabatan:</span>
            {{ $surat->approver->jabatan ?? '-' }}
        </div>

        <div class="item">
            <span class="label">Tanggal Persetujuan:</span>
            {{ $surat->approved_at ? \Carbon\Carbon::parse($surat->approved_at)->translatedFormat('d F Y H:i') : '-' }}
        </div>

        <div class="status">
            SURAT SAH & TELAH DISETUJUI
        </div>
    </div>
</body>

</html>
