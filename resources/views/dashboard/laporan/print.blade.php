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
                <td><img src="img/tablogo.png" width="90px"></td>
                <td class="tengah">
                    <h2>PEMERINTAH KABUPATEN KERINCI</h2>
                    <h2>SMP NEGERI 29 KERINCI</h2>
                    <h3>LAPORAN DATA PENERIMAAN PESERTA DIDIK BARU</h3>
                </td>
                {{-- <td><img src="img/tablogo.png" width="140px"></td> --}}
            </tr>
        </table>
    </div>
    <div>
        <h4>LAPORAN DATA PPDB BULAN : {{ Carbon\Carbon::parse($bln)->isoFormat('MMMM Y') }}</h4>
        {{-- <h4>TANGGAL CETAK LAPORAN : {{ Carbon\Carbon::now()->isoFormat('d MMMM Y') }}</h4> --}}
        <table class="table-body">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Status Kelulusan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ppdb as $item)
                    <tr>
                        <th>
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            @php
                                $a = App\Models\ModelDataSiswa::where(
                                    'id_data_siswa',
                                    $item->id_data_siswa,
                                )->first();
                            @endphp
                            {{ $a->nisn }}
                        </td>
                        <td>
                            {{ $a->nama }}<br>
                        </td>
                        <td>
                            {{ $a->asal_sekolah }}<br>
                        </td>
                        <td>
                            @if ($item->status == 1)
                                Lulus
                            @else
                                Tidak Lulus
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <style>
            .right-align {
                width: 100%;
            }

            .left {
                width: 50%;
            }
        </style>
        <br>
        <br>
        <table class="right-align">
            <tr>
                <td>&nbsp;</td>
                <td class="left">&nbsp;</td>
                <td style="text-align: left">Kerinci, {{ Carbon\Carbon::now()->isoFormat('d MMMM Y') }}</td>
            </tr>
            <tr>
                {{-- <td style="text-align: center">Kepala Seksi Tindak Pidana Umum<br>Kejaksaan Negeri Sungai Penuh</td> --}}
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="text-align: left">Mengetahui<br>Kepala Sekolah</td>
            </tr>
            <tr>
                <td>&nbsp;<br>&nbsp;</td>
                <td>&nbsp;<br>&nbsp;</td>
                <td>&nbsp;<br>&nbsp;</td>
            </tr>
            <tr>
                {{-- <td style="text-align: center">Sukma Djaya Negara, SH., M.Hum</td> --}}
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                {{-- <td style="text-align: center">Wahyu Nugraha Efendi., SH., MH</td> --}}
            </tr>
        </table>
    </div>
</body>

</html>
