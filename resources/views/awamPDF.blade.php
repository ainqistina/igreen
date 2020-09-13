<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pembersihan Awam</title>
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
            opacity: 0.4;
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
    <div class="right">
        @php
            echo date("l jS \of F Y h:i:s A");
        @endphp
    </div>
    
    <div class="center">
        <img src="{{ public_path('/img/mpk.png') }}" alt="Majlis Perbandaran Kluang">
        <h3>MAJLIS PERBANDARAN KLUANG</h3>
        <h4>Pembersihan Awam</h4>
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
                <th>{{ $serahan->jumlah_serahan }}</th>
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
                <th>{{ $serahan->jumlah_terima }}</th>
            </tr>
        </tbody>
    </table>

    <br>
    <h3><b>C. MAKLUMAT PEMBERSIHAN AWAM</b></h3>
    <div class="left">
        <div class="form-group col-md-4">
            <label class="small mb-1">Taman:</label>
            {{ $serahan->taman }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Jalan:</label>
            {{ $serahan->jalan }}
        </div>
        <br>
        <div class="form-group col-md-4">
            <label class="small mb-1">Sub Kategori:</label>
            {{ $serahan->sub_awam }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Jenis Sub Kategori:</label>
            {{ $serahan->jenis }}
        </div>
        <br>
        <div class="form-group col-md-4">
            <label class="small mb-1">Unit/Panjang/Keluasan:</label>
            {{ $serahan->unit }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1">Jenis:</label>
            {{ $serahan->jenis_sub }}
        </div>
        <br>
        <div class="form-group col-md-4">
            <label class="small mb-1">Frekuensi:</label>
            {{ $serahan->frekuensi }}
        </div>
        <div class="form-group col-md-4">
            <label class="small mb-1" for="catatan">Catatan:</label>
            {{ $serahan->catatan }}
        </div>
        <p id="tarikh"></p>
    </div>
    
    <div class="center">
        <h5>SULIT DAN PERSENDIRIAN</h5>
    </div>

</body>
</html>