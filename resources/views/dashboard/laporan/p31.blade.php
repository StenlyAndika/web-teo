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
            border-collapse: collapse;
        }

        .tb2 {
            text-align: center !important;
            padding: 0%;
            margin: 0%;
        }

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
    <table>
        <tr style="vertical-align: top;">
            <th style="text-align: left;">Menimbang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <td>a.</td>
            <td colspan="3">Bahwa Penuntut Umum berpendapat, dari hasil penyidikan dapat dilakukan penuntutan dengan dakwaan telah melakukan tindak pidana sebagaimana diuraikan dan diancam dengan pidana dalam <strong><i>Kesatu Primair</i></strong> Pasal 263 Ayat (2) KUHPidana, <strong><i>Subsidair</i></strong> Pasal 263 Ayat (2) KUHPidana Jo Pasal 55 Ayat (1) KUHPidana, <strong><i>Kedua Primair</i></strong> Pasal 263 Ayat (1) KUHPidana, <strong><i>Subsidair</i></strong> Pasal 263 Ayat (1) KUHPidana Jo Pasal 55 Ayat (1) KUHPidana.</td>
        </tr>
        <tr style="vertical-align: top;">
            <th></th>
            <td>b.</td>
            <td colspan="3">Bahwa pemeriksaan selanjutnya adalah masuk wewenang PENGADILAN NEGERI SUNGAI PENUH.</td>
        </tr>
        <tr style="vertical-align: top;">
            <th style="text-align: left;">Membaca</th>
            <td></td>
            @php
                $d = App\Models\ModelPenerimaanSPDP::where('id_penerimaan_spdp', $p31->id_penerimaan_spdp)->first();
            @endphp
            <td colspan="3">Berkas Perkara Reg. Nomor {{ $d->no_spdp }} yang dibuat oleh Penyidik atas sumpah jabatan dalam perkara Terdakwa.</td>
        </tr>
        {{-- <tr style="vertical-align: top;">
            <th></th>
            <td>3.</td>
            <td colspan="3">Surat Pemberitahuan Dimulainya Penyidikan terhadap tersangka.</td>
        </tr>
        @php
            $d = App\Models\ModelTersangka::where('id_penerimaan_spdp', $p16->id_penerimaan_spdp)->first();
        @endphp
        <tr>
            <th colspan="2"></th>
            <td>Nama Lengkap</td>
            <td colspan="2">: {{ $d->nama }}</td>
        </tr>
        <tr>
            <th colspan="2"></th>
            <td>Tempat Lahir</td>
            <td colspan="2">: {{ $d->tempat_lahir }}</td>
        </tr>
        <tr>
            <th colspan="2"></th>
            <td>Tanggal Lahir</td>
            <td colspan="2">: {{ Carbon\Carbon::parse($d->tgl_lahir)->format('d-F-Y') }}</td>
        </tr>
        <tr>
            <th colspan="2"></th>
            <td>Kewarganegaraan</td>
            <td colspan="2">: Indonesia</td>
        </tr>
        <tr>
            <th colspan="2"></th>
            <td>Tempat Tinggal</td>
            <td colspan="2">: {{ $d->alamat }}</td>
        </tr>
        <tr>
            <th colspan="2"></th>
            <td>Agama</td>
            <td colspan="2">: {{ $d->agama }}</td>
        </tr>
        <tr>
            <th colspan="2"></th>
            <td>Pekerjaan</td>
            <td colspan="2">: {{ $d->pekerjaan }}</td>
        </tr>
        <tr>
            <th colspan="5">&nbsp;</th>
        </tr>
        @php
            $b = App\Models\ModelPenerimaanSPDP::where('id_penerimaan_spdp', $p16->id_penerimaan_spdp)->first();
        @endphp
        <tr>
            <th colspan="2"></th>
            <td colspan="3">Diduga melanggar {{ $b->undang_undang_dan_pasal }}</td>
        </tr>
        <tr>
            <th colspan="5">&nbsp;</th>
        </tr>
        <tr style="vertical-align: top;">
            <th style="text-align: left;">Pertimbangan</th>
            <td>1.</td>
            <td colspan="3">Bahwa dengan diterimanya pemberitahuan dimulainya penyidikan, dipandang perlu untuk
                menugaskan seseorang / beberapa orang Jaksa PU untuk mengikuti perkembangan penyidikan dan meneliti hasil
                penyedikan perkara tersebut sesuai dengan peraturan perundang-undangan dan ketentuan administrasi perkara
                tindak pidana.</td>
        </tr>
        <tr style="vertical-align: top;">
            <th></th>
            <td>2.</td>
            <td colspan="3">Bahwa sebagai pelaksananya perlu dikeluarkan Surat Perintah Kepala Kejaksaan Negeri Sungai
                Penuh.</td>
        </tr>
        <tr>
            <th colspan="5">&nbsp;</th>
        </tr>
        <tr>
            <th></th>
            <td></td>
            <td colspan="3" class="table-header font-bold tengah">
                <h5>MEMERINTAHKAN : </h5>
        </tr>
        @php
            $jp = App\Models\ModelJaksaPenuntut::where(
                'id_penerimaan_berkas_tahap_i',
                $p16->id_penerimaan_berkas_tahap_i,
            )->get();
        @endphp
        <tr>
            <th colspan="2" style="text-align: left;">Kepada</th>
            <td class="tb1">Nama Jaksa</td>
            <td class="tb1">Pangkat</td>
            <td class="tb1">NIP</td>
        </tr>
        @foreach ($jp as $itemjp)
            @php
                $jaksa = App\Models\ModelJaksa::where('id_jaksa', $itemjp->id_jaksa)->first();
            @endphp
            <tr>
                <th colspan="2"></th>
                <td class="tb1">{{ $jaksa->nama }}</td>
                <td class="tb1">{{ $jaksa->pangkat }}</td>
                <td class="tb1">{{ $jaksa->nip }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="5">&nbsp;</th>
        </tr>
        <tr>
            <th style="text-align: left;">Untuk</th>
            <td colspan="4">1. Mengikuti perkembangan penyidikan</td>
        </tr>
        <tr>
            <th></th>
            <td colspan="4">2. Melakukan penelitian hasi penyidikan atas nama tersangka tersebut</td>
        </tr>
        <tr>
            <th></th>
            <td colspan="4">3. Melakukan penelitian SP-3 dari penyidik</td>
        </tr>
        <tr>
            <th></th>
            <td colspan="4">4. Agar dilaksanakan dengan penuh rasa tanggung jawab</td>
        </tr> --}}
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
            <th colspan="3" style="text-align: left">Kepala Seksi Tindak Pidana Umum</th>
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
            <td colspan="3" style="text-align: left">Wahyu Nugraha Efendi, SH., MH</td>
        </tr>
    </table>
</body>
</html>
