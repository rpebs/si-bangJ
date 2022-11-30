<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Surat Keluar Organisasi Kepanduan</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Tanggal Masuk</th>
                    <th>Pengirim</th>
                    <th>Perihal</th>
                    <th>Tempat</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

        <tbody>
            <?php $no = 0; ?>
            @foreach ($suratkeluar as $d)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $d->kode_surat }}</td>
                    <td>{{ $d->kategori->nama_kategori }}</td>
                    <td>{{ $d->tgl_masuk }}</td>
                    <td>{{ $d->tujuan }}</td>
                    <td>{{ $d->perihal }}</td>
                    <td>{{ $d->tempat }}</td>
                    <td>{{ $d->tgl_mulai }}</td>
                    <td>{{ $d->tgl_selesai }}</td>
                    <td>{{ $d->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
