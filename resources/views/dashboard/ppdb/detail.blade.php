@extends('layouts.admin')

@section('container')
    <div id="sticky-banner" tabindex="-1"
        class="top-0 mb-4 start-0 z-50 flex justify-between w-full p-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
    </div>
    @php
        $siswa = App\Models\ModelDataSiswa::where('id_data_siswa', $ppdb->id_data_siswa)->first();
        $ayah = App\Models\ModelDataAyah::where('id_data_ayah', $ppdb->id_data_ayah)->first();
        $ibu = App\Models\ModelDataIbu::where('id_data_ibu', $ppdb->id_data_ibu)->first();
    @endphp
    <div class="mt-2">
        <div id="sticky-banner" tabindex="-1"
            class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold text-gray-900">Data Siswa</h1>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">NISN
                    (Nomor Induk Siswa Nasional)</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->nisn }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">NIK
                    (Nomor Induk Kependudukan)</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->nik }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Nama</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->nama }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Nama
                    Panggilan</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->panggilan }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Tempat
                    Lahir</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->tempat_lahir }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Tanggal
                    Lahir</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ Carbon\Carbon::parse($siswa->tgl_lahir)->format('d-m-Y') }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Jenis
                    Kelamin</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->jekel }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Alamat</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->alamat }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Asal
                    Sekolah</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->asal_sekolah }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Nomor
                    HP/WA</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $siswa->no_telp }}" disabled />
                </div>
            </div>
        </div>

        <div id="sticky-banner" tabindex="-1"
            class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold text-gray-900">Data Ayah</h1>
        </div>

        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">NIK
                    (Nomor Induk Kependudukan)</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ayah->nik }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Nama</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ayah->nama }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Pendidikan</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ayah->pendidikan }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Pekerjaan</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ayah->pekerjaan }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">No
                    Telp</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ayah->no_telp }}" disabled />
                </div>
            </div>
        </div>

        <div id="sticky-banner" tabindex="-1"
            class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold text-gray-900">Data Ibu</h1>
        </div>

        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">NIK
                    (Nomor Induk Kependudukan)</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ibu->nik }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Nama</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ibu->nama }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Pendidikan</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ibu->pendidikan }}" disabled />
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Pekerjaan</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ibu->pekerjaan }}" disabled />
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">No
                    Telp</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300"
                        value="{{ $ibu->no_telp }}" disabled />
                </div>
            </div>
        </div>

        <div id="sticky-banner" tabindex="-1"
            class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold text-gray-900">Berkas Pendaftaran</h1>
        </div>

        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Akta</label>
                <div class="relative w-full">
                    <a href="{{ asset('storage/' . str_replace('public/', '', $ppdb->upload_akta)) }}" target="_blank"
                        class="block p-2.5 w-full z-20 text-sm text-white bg-gray-500 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300">Lihat
                        Berkas</a>
                </div>
            </div>
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Kartu
                    Keluarga</label>
                <div class="relative w-full">
                    <a href="{{ asset('storage/' . str_replace('public/', '', $ppdb->upload_kk)) }}" target="_blank"
                        class="block p-2.5 w-full z-20 text-sm text-white bg-gray-500 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300">Lihat
                        Berkas</a>
                </div>
            </div>
        </div>
        <div class="grid gap-6 mb-2 md:grid-cols-2 text-left">
            <div class="flex">
                <label
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg w-80">Ijazah
                    Terakhir</label>
                <div class="relative w-full">
                    <a href="{{ asset('storage/' . str_replace('public/', '', $ppdb->upload_ijazah)) }}" target="_blank"
                        class="block p-2.5 w-full z-20 text-sm text-white bg-gray-500 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300">Lihat
                        Berkas</a>
                </div>
            </div>
        </div>

        <div class="flex space-x-1 items-center pb-4 mt-4 rounded-t">
            <a href="{{ route('admin.ppdb.index') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm px-5 py-2.5">Selesai</a>
        </div>
    </div>
@endsection
