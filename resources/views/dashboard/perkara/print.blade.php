<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-size: 12px !important;
        }

        .table-body {
            width: 100%;
            border-collapse: collapse;
            /* Ensures that borders are not doubled */
        }

        .table-body th,
        .table-body td {
            border: 1px solid black;
        }

        .table-body th,
        .table-body td {
            padding: 8px;
            text-align: left;
        }

        .table-header {
            border-bottom: 5px solid black !important;
            padding: 2px;
            width: 100%;
        }

        .tengah {
            text-align: center;
            line-height: 20px;
        }
    </style>
</head>

<body>
    <div>
        <table width="100%" class="table-header">
            <tr>
                <td class="tengah">
                    <h1>LAPORAN DATA PERKARA</h1>
            </tr>
        </table>
        <h4>LAPORAN DATA PERKARA BULAN : {{ Carbon\Carbon::parse($bln)->format('F Y') }}</h4>
        <h4>TANGGAL CETAK LAPORAN : {{ Carbon\Carbon::now()->format('d-F-Y') }}</h4>
        <table class="table-body">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Perkara</th>
                    <th>Tanggal Pendaftaran</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Hakim</th>
                    <th>Tanggal Putusan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perkara as $item)
                    <tr>
                        <th>
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            {{ $item->no_perkara }}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->tgl_pendaftaran)->format('d-m-Y') }}
                        </td>
                        <td>
                            @php
                                $a = App\Models\ModelKategori::where('id_kategori', $item->id_kategori)->first();
                            @endphp
                            {{ $a->nama_kategori }}
                        </td>
                        <td>
                            {{ $item->status }}
                        </td>
                        <td>
                            @php
                                $a = App\Models\ModelHakim::where('id_hakim', $item->id_hakim)->first();
                            @endphp
                            {{ $a->nama_hakim }}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->tgl_putusan)->format('d-m-Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <style>
            .container {
                width: 100%;
            }

            .right-align {
                width: 100%;
                text-align: left;
            }

            .right-align td:first-child {
                width: 75%;
            }

            .right-align td:last-child {
                width: 25%;
            }
        </style>
        <br>
        <br>
        <table class="right-align">
            <tr>
                <td>&nbsp;</td>
                <td>Sungai Penuh, {{ Carbon\Carbon::now()->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td>Diketahui Jaksa</td>
                <td>Diketahui Hakim</td>
            </tr>
        </table>
    </div>
</body>

</html>
