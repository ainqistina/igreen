<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pengurusan Sisa Pepejal</title>
    <style>
        body {
            font-size: 14px;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
            /* text-indent: 23px; */
        }

        .right {
            text-align: right;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, td, th {
            border: 1px solid black;
        }

        .content {
            background-image: url("/img/mpk.png");
            background-repeat: no-repeat;
            background-position: center top;
            opacity: 0.6;
            /* color: black; */
        }

        img {
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="center">
        <img src="{{ public_path('/img/mpk.png') }}" alt="Majlis Perbandaran Kluang">
        <h3>MAJLIS PERBANDARAN KLUANG</h3>
        <h4>Pengurusan Sisa Pepejal</h4>
    </div>

    <br>
    <h3><b>A. INFO SERAHAN</b></h3>
    <table>
        <thead>
            <tr>
                <th>Tarikh Serahan</th>
                <th>Jumlah Serahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ $serahan->serahan }}</th>
                <th>RM {{ $serahan->jumlah_serahan }}</th>
            </tr>
        </tbody>
    </table>
    <br>
    <h3><b>B. INFO TERIMA</b></h3>
    <table>
        <thead>
            <tr>
                <th>Tarikh Terima</th>
                <th>Jumlah Terima</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ $serahan->terima }}</th>
                <th>RM {{ $serahan->jumlah_terima }}</th>
            </tr>
        </tbody>
    </table>
    <br>
    <h3><b>C. MAKLUMAT SISA PEPEJAL</b></h3>
    {{-- <table>
        <thead>
            <tr>
                <th>Taman</th>
                <th>Jalan</th>
                <th>Sub Kategori</th>
                <th>Frekuensi</th>
                <th>Hari</th>
                <th>Lokasi</th>
                <th>Jenis Lokasi</th>
                <th>Unit</th>
                <th>Saiz Bin</th>
                <th>Bilangan Tong</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ $serahan->taman }}</th>
                <th>{{ $serahan->jalan }}</th>
                <th>{{ $serahan->sub_sisa }}</th>
                <th>{{ $serahan->frekuensi }}</th>
                <th>{{ $serahan->hari }}</th>
                <th>{{ $serahan->lokasi }}</th>
                <th>{{ $serahan->jenis_lokasi }}</th>
                <th>{{ $serahan->unit }}</th>
                <th>{{ $serahan->saiz_bin }}</th>
                <th>{{ $serahan->bil_tong }}</th>
            </tr>
        </tbody>
    </table> --}}
    <div class="left">
        <div class="form-group col-md-4">
            <label>Taman:</label>
            {{ $serahan->taman }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Jalan:</label>
            {{ $serahan->jalan }}
        </div>
        <br>
        <div class="form-group col-md-4">
            <label class="small mb-1">Sub Kategori:</label>
            {{ $serahan->sub_sisa }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Frekuensi:</label>
            {{ $serahan->frekuensi }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Hari:</label>
            {{ $serahan->hari }}
        </div>
        <br>
        <div class="form-group col-md-4">
            <label class="small mb-1">Lokasi:</label>
            {{ $serahan->lokasi }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Jenis Lokasi:</label>
            {{ $serahan->jenis_lokasi }}
        </div>
        <br>
        <div class="form-group col-md-4">
            <label class="small mb-1">Unit:</label>
            {{ $serahan->unit }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Saiz Bin:</label>
            {{ $serahan->saiz_bin }}
        </div>
        <br>
        <div class="form-group col-md-4">
            <label class="small mb-1">Bilangan Tong:</label>
            {{ $serahan->bil_tong }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Catatan:</label>
            {{ $serahan->catatan }}
        </div>
    </div>

    <div class="center">
        <h5>SULIT DAN PERSENDIRIAN</h5>
    </div>

</body>

</html>