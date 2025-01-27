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
                    <h1>LAPORAN DATA PELIMPAHAN</h1>
            </tr>
        </table>
        <h4>LAPORAN DATA PELIMPAHAN BULAN : {{ Carbon\Carbon::parse($bln)->format('F Y') }}</h4>
        <h4>TANGGAL CETAK LAPORAN : {{ Carbon\Carbon::now()->format('d-F-Y') }}</h4>
        <table class="table-body">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Asal, Nomor dan Tanggal Berkas</th>
                    <th>Nomor dan Tanggal Berkas P16</th>
                    <th>Tersangka</th>
                    <th>Jaksa Peneliti</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelimpahan as $item)
                    <tr>
                        <th>
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            @php
                            $a = App\Models\ModelPenerimaanSPDP::where(
                                'id_penerimaan_spdp',
                                $item->id_penerimaan_spdp,
                            )->first();
                        @endphp
                        {{ $a->nama }}<br>
                        {{ $a->no_spdp . ' ' . Carbon\Carbon::parse($a->tgl_spdp)->format('d-m-Y') }}<br>
                        Diterima SPDP : {{ Carbon\Carbon::parse($a->tgl_diterima)->format('d-m-Y') }}
                        </td>
                        <td>
                            {{ $item->no_p16 . ' ' . Carbon\Carbon::parse($item->tglp16p)->format('d-m-Y') }}
                        </td>
                        <td>
                            @php
                            $ab = App\Models\ModelTersangka::where(
                                'id_penerimaan_spdp',
                                $item->id_penerimaan_spdp,
                                )->first();
                                @endphp
                        {{ $ab->nama }}<br>
                        </td>
                        <td>
                            @php
                            $jp = App\Models\ModelJaksaPenuntut::where(
                                'id_penerimaan_berkas_tahap_i',
                                $item->id_penerimaan_berkas_tahap_i,
                            )->get();
                        @endphp
                        @foreach ($jp as $itemjp)
                            @php
                                $jaksa = App\Models\ModelJaksa::where(
                                    'id_jaksa',
                                    $itemjp->id_jaksa,
                                )->first();
                            @endphp
                            {{ $loop->iteration . '.' . $jaksa->nama . ' - ' . $jaksa->pangkat }}<br>
                        @endforeach
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
