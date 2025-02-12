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

        .kopsurat {
            width: 100%;
            align-content: left;
        }

        .kop {
            border-bottom : 5px solid #000;
            padding: 2px;
            text-align: center;
            width: 100%;
        }

        .tengah {
            text-align : center;
            line-height: 5px;
        }

    </style>
</head>

<body>
    <div class="kopsurat">
        <table class="kop">
            <tr>
                <td><img src="img/tablogo.png" width="140px"></td>
                <td class="tengah">
                    <h1>LAPORAN DATA PERKARA</h1>
                    <h1>TINDAK PIDANA UMUM</h1>
                    <h1>KEJAKSAAN NEGERI SUNGAI PENUH</h1>
                </td>
                <td><img src="img/tablogo2.png" width="140px"></td>
            </tr>
        </table>
    </div>
    <div>
        <h4>LAPORAN DATA PELIMPAHAN BULAN : {{ Carbon\Carbon::parse($bln)->format('F Y') }}</h4>
        <h4>TANGGAL CETAK LAPORAN : {{ Carbon\Carbon::now()->format('d-F-Y') }}</h4>
        <table class="table-body">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Asal, Nomor dan Tanggal Berkas</th>
                    <th>Jenis Perkara</th>
                    <th>Nama Tersangka</th>
                    <th>Pasal Dilanggar</th>
                    <th>Jaksa Peneliti</th>
                    <th>Tanggal Pelimpahan</th>
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
                            $c = App\Models\ModelInstansiPelaksana::where(
                                'id_instansi_pelaksana',
                                $a->id_instansi_pelaksana,
                            )->first();
                        @endphp
                        {{ $c->nama }}<br>
                        {{ $a->no_spdp . ' ' . Carbon\Carbon::parse($a->tgl_spdp)->format('d-m-Y') }}<br>
                        Diterima SPDP : {{ Carbon\Carbon::parse($a->tgl_diterima)->format('d-m-Y') }}
                    </td>
                    <td>
                            {{ $a->jenis_pidana }}<br>
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
                        {{ $a->undang_undang_dan_pasal }}<br>
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
                        <td>
                            {{ Carbon\Carbon::parse($item->tgl_pelimpahan)->format('d-m-Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <style>
            .right-align {
                width: 100%;
                text-align: left;
            }

            .left {
                width: 75%;
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
                <td class="left">Mengetahui<br>Kepala Kejaksaan Negeri Sungai Penuh</td>
                <td>Kepala Seksi Tindak Pidana Umum<br>Kejaksaan Negeri Sungai Penuh</td>
            </tr>
            <tr>
                <td>&nbsp;<br>&nbsp;</td>
                <td>&nbsp;<br>&nbsp;</td>
                <td>&nbsp;<br>&nbsp;</td>
            </tr>
            <tr>
                <td>Sukma Djaya Negara, SH., M.Hum</td>
                <td>Wahyu Nugraha Efendi., SH., MH</td>
            </tr>
        </table>
    </div>
</body>

</html>
