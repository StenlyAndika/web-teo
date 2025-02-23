<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .tb1 {
            border: 1px solid black;
        }

        .tb3{
            border-collapse: collapse !important;
        }

        .tb2 {
            text-align: center !important;
            padding: 0%;
            margin: 0%;
        }

        body {
            font-size: 14px !important;
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
                <td><img src="img/tablogo.png" width="100px"></td>
                <td class="tengah">
                    <h2>KEJAKSAAN REPUBLIK INDONESIA</h2>
                    <h2>KEJAKSAAN TINGGI JAMBI</h2>
                    <h1>KEJAKSAAN NEGERI SUNGAI PENUH</h1>
                    <p>Jl. Depati Parbo, Pondok Tinggi Kota Sungai Penuh 37111</p>
                    <p>Telp. (0748) 21328 fax. (0748) 22272 www.kejari-sungaipenuh.go.id</p>
                </td>
            </tr>
        </table>
    </div>
    <table width="100%">
        <tr>
            <td style="width: 32%"><strong>"Demi Keadilan dan Kebenaran Berdasarkan Ketuhanan Yang Maha Esa"</strong></td>
            <td style="text-align: right"><strong>P-31</strong></td>
        </tr>
    </table>
    <table width="100%" class="tb2">
        <tr>
            <td>
                <h4>SURAT PELIMPAHAN PERKARA</h4>
                <h4>ACARA PEMERIKSAAN BIASA</h4>
                <h4>NOMOR: {{ $p31->no_p31 }}</h4>
                <h4>KEPALA KEJAKSAAN NEGERI SUNGAI PENUH</h4>
        </tr>
    </table>
    <table class="tb3">
        <tr style="vertical-align: top;">
            <td style="text-align: left;">Menimbang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td rowspan="2">:&nbsp;</td>
            <td>a.</td>
            <td colspan="4">Bahwa Penuntut Umum berpendapat, dari hasil penyidikan dapat dilakukan penuntutan dengan dakwaan telah melakukan tindak pidana sebagaimana diuraikan dan diancam dengan pidana dalam <strong><i>Kesatu Primair</i></strong> Pasal 263 Ayat (2) KUHPidana, <strong><i>Subsidair</i></strong> Pasal 263 Ayat (2) KUHPidana Jo Pasal 55 Ayat (1) KUHPidana, <strong><i>Kedua Primair</i></strong> Pasal 263 Ayat (1) KUHPidana, <strong><i>Subsidair</i></strong> Pasal 263 Ayat (1) KUHPidana Jo Pasal 55 Ayat (1) KUHPidana.</td>
        </tr>
        <tr style="vertical-align: top;">
            <th></th>
            <td>b.</td>
            <td colspan="4">Bahwa pemeriksaan selanjutnya adalah masuk wewenang PENGADILAN NEGERI SUNGAI PENUH.</td>
        </tr>
        <tr>
            <th colspan="7">&nbsp;</th>
        </tr>
        <tr style="vertical-align: top;">
            <td style="text-align: left;">Membaca</td>
            <td>:&nbsp;</td>
            @php
                $d = App\Models\ModelPenerimaanSPDP::where('id_penerimaan_spdp', $p31->id_penerimaan_spdp)->first();
            @endphp
            <td colspan="4">Berkas Perkara Reg. Nomor {{ $d->no_spdp }} yang dibuat oleh Penyidik atas sumpah jabatan dalam perkara Terdakwa.</td>
        </tr>
        <tr>
            <th colspan="7">&nbsp;</th>
        </tr>
        @php
            $tersangka = App\Models\ModelTersangka::where(
                'id_penerimaan_spdp',
                $p31->id_penerimaan_spdp,
                )->first();
        @endphp
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="tb1" style="text-align: center;">No</td>
            <td class="tb1" style="text-align: center;">Nama Terdakwa</td>
            <td class="tb1" style="text-align: center;">Ditahan Penyidik/Penuntut Umum</td>
            <td class="tb1" style="text-align: center;">Jenis Tahanan<br>a.Rutan<br>b.Rumah<br>c.Kota</td>
            <td class="tb1" style="text-align: center;">Keterangan</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="tb1" style="text-align: center;">1</td>
            <td class="tb1" style="text-align: center;">2</td>
            <td class="tb1" style="text-align: center;">3</td>
            <td class="tb1" style="text-align: center;">4</td>
            <td class="tb1" style="text-align: center;">5</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="tb1" rowspan="3" style="text-align: center;">1</td>
            <td class="tb1" rowspan="3" style="text-align: center;">{{ $tersangka->nama }}</td>
            <td class="tb1" style="text-align: center;">Penyidik</td>
            <td class="tb1" rowspan="3" style="text-align: center;">{{ $p31->jenis_tahanan }}, {{ Carbon\Carbon::parse($p31->tgl_penahanan_dari)->format('d-m-Y') }} s.d {{ Carbon\Carbon::parse($p31->tgl_penahanan_hingga)->format('d-m-Y') }}</td>
            <td class="tb1" style="text-align: center;">@if ($p31->jenis_tahanan == "Rutan")
                    {{ $p31->lokasi_penahanan }}
                @else
                    Tidak dilakukan penahanan
                @endif</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="tb1" style="text-align: center;">Perpanjangan PU</td>
            <td class="tb1" style="text-align: center;">@if ($p31->jenis_tahanan == "Rumah")
                {{ $p31->lokasi_penahanan }}
            @else
                Tidak dilakukan penahanan
            @endif</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="tb1" style="text-align: center;">Penuntutut Umum</td>
            <td class="tb1" style="text-align: center;">@if ($p31->jenis_tahanan == "Kota")
                {{ $p31->lokasi_penahanan }}
            @else
                Tidak dilakukan penahanan
            @endif</td>
        </tr>
        <tr>
            <th colspan="7">&nbsp;</th>
        </tr>
        @php
            $spdp = App\Models\ModelPenerimaanSPDP::where(
                                'id_penerimaan_spdp',
                                $p31->id_penerimaan_spdp,
                            )->first();
        @endphp
        <tr style="vertical-align: top;">
            <td style="text-align: left;">Mengingat</td>
            <td>:&nbsp;</td>
            <td colspan="4">{{ $spdp->undang_undang_dan_pasal }}</td>
        </tr>
        <tr>
            <th colspan="7">&nbsp;</th>
        </tr>
        <tr style="vertical-align: top;">
            <td style="text-align: left;">Menetapkan</td>
            <td>:&nbsp;</td>
            <td colspan="5">Melimpahkan perkara terdakwa <strong>{{ $tersangka->nama }}</strong> ke PENGADILAN NEGERI SUNGAI PENUH dengan acara pemeriksaan biasa dan mohon segera mengadili perkara tersebut atas dakwaan sebagaimana dimaksud dalam surat dakwaan terlampir.</td>
        </tr>
        <tr>
            <th colspan="7">&nbsp;</th>
        </tr>
        <tr style="vertical-align: top;">
            <td style="text-align: left;">Meminta</td>
            <td rowspan="2">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="5">1. Agar Ketua PENGADILAN NEGERI SUNGAI PENUH menetapkan hari persidangan untuk mengadili perkara tersebut dan menetapkan pemanggilan terdakwa serta saksi-saksi.</td>
        </tr>
        <tr>
            <th></th>
            <td colspan="5">2. Mengeluarkan penetapan untuk tetap menahan terdakwa <strong>{{ $tersangka->nama }}</strong> di {{ $p31->lokasi_penahanan }}.</td>
        </tr>
    </table>

    <style>
        .right-align {
            width: 100%;
            text-align: left;
        }

        .right-align td:first-child {
            width: 65%;
        }

        .right-align td:last-child {
            width: 15%;
        }
    </style>
    <br>
    <br>
    <table class="right-align">
        <tr>
            <td>&nbsp;</td>
            <td>Dikeluarkan di</td>
            <td colspan="2"> : Sungai Penuh</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Pada tanggal</td>
            <td colspan="2"> : {{ Carbon\Carbon::now()->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <th colspan="3" style="text-align: left">AN. KEPALA KEJAKSAAN NEGERI SUNGAI PENUH<br>KEPALA SEKSI TINDAK PIDANA UMUM SELAKU PENUNTUT UMUM</th>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3" style="text-align: left"><u><strong>Wahyu Nugraha Efendi, SH., MH</strong></u></td>
        </tr>
    </table>
</body>
</html>
