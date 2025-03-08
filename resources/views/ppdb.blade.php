@extends('layouts.home')

@section('container')
    <section class="bg-white">
        <div class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-20">
            <div id="sticky-banner" tabindex="-1"
                class="top-0 start-0 z-50 flex justify-content-end w-full p-4 border-b border-gray-200">
                <h1 class="text-2xl font-semibold text-gray-900">Form Penerimaan Peserta Didik baru</h1>
            </div>
            <p
                class="max-w-screen-xl mb-6 font-bold border-b border-gray-200 text-red-500 lg:mb-8 md:text-md lg:text-md text-left">
                Perhatian! Pastikan data yang diinput sudah benar, kesalahan dalam pengisian data menjadi tanggung jawab
                peserta.</p>
            @if (session('toast_error'))
                <div id="alertDialog"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-100 rounded-lg shadow fixed bottom-5 right-5"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        <span class="sr-only">X icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">{{ session('toast_error') }}</div>
                </div>
            @endif
            <div class="mt-2">
                <form method="post" action="{{ route('admin.ppdb.store') }}" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900">NISN (Nomor Induk
                                Siswa Nasional)</label>
                            <input type="text" id="nisn" name="nisn"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="0028059453" value="{{ old('nisn') }}" required />
                        </div>
                        <div>
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK (Nomor Induk
                                Kependudukan)</label>
                            <input type="text" id="nik" name="nik"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="1501162210020001" value="{{ old('nik') }}" required />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Budi Rajin Menabung" value="{{ old('nama') }}" required />
                        </div>
                        <div>
                            <label for="panggilan" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Panggilan</label>
                            <input type="text" id="panggilan" name="panggilan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Budi" value="{{ old('panggilan') }}" required />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tempat
                                Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Koto Petai" value="{{ old('tempat_lahir') }}" required />
                        </div>
                        <div>
                            <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Lahir</label>
                            <div class="flex w-full">
                                <input type="text" datepicker datepicker-autohide datepicker-format="dd-mm-yyyy"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="dd-mm-yyyy" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                    required>
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="jekel" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                            <select id="jekel" name="jekel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>-- Pilih --</option>
                                <option value="Laki-laki" @if (old('jekel') == 'Laki-laki') selected @endif>Laki-laki
                                </option>
                                <option value="Perempuan" @if (old('jekel') == 'Perempuan') selected @endif>Perempuan
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                            <input type="text" id="alamat" name="alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Koto Petai" value="{{ old('alamat') }}" required />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="asal_sekolah" class="block mb-2 text-sm font-medium text-gray-900">Asal
                                Sekolah</label>
                            <input type="text" id="asal_sekolah" name="asal_sekolah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="SDN X/III Koto Baru" value="{{ old('asal_sekolah') }}" required />
                        </div>
                        <div>
                            <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">No Telp</label>
                            <input type="text" id="no_telp" name="no_telp"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="081222080900" value="{{ old('no_telp') }}" required />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="upload_kk" class="block mb-2 text-sm font-medium text-gray-900">Upload KK</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="upload_kk" name="upload_kk" type="file" value="{{ old('upload_kk') }}">
                        </div>
                        <div>
                            <label for="upload_akta" class="block mb-2 text-sm font-medium text-gray-900">Upload Akta</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="upload_akta" name="upload_akta" type="file" value="{{ old('upload_akta') }}">
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="upload_ijazah" class="block mb-2 text-sm font-medium text-gray-900">Upload Ijazah</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="upload_ijazah" name="upload_ijazah" type="file" value="{{ old('upload_ijazah') }}">
                        </div>
                    </div>
                    <div id="sticky-banner" tabindex="-1"
                        class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
                        <h1 class="text-xl font-semibold text-gray-900">Data Orang Tua (Ayah)</h1>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="nik_ayah" class="block mb-2 text-sm font-medium text-gray-900">NIK Ayah</label>
                            <input type="text" id="nik_ayah" name="nik_ayah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="1501161707860001" value="{{ old('nik_ayah') }}" required />
                        </div>
                        <div>
                            <label for="nama_ayah" class="block mb-2 text-sm font-medium text-gray-900">Nama Ayah</label>
                            <input type="text" id="nama_ayah" name="nama_ayah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Tono" value="{{ old('nama_ayah') }}" required />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="pekerjaan_ayah"
                                class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                            <select id="pekerjaan_ayah" name="pekerjaan_ayah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option>-- Pilih --</option>
                                @foreach ($pekerjaan as $item)
                                    <option value="{{ $item }}" @if (old('pekerjaan_ayah') == $item) selected @endif>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="pendidikan_ayah"
                                class="block mb-2 text-sm font-medium text-gray-900">Pendidikan</label>
                            <select id="pendidikan_ayah" name="pendidikan_ayah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option>-- Pilih --</option>
                                @foreach ($pendidikan as $item)
                                    <option value="{{ $item }}" @if (old('pendidikan_ayah') == $item) selected @endif>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="no_telp_ayah" class="block mb-2 text-sm font-medium text-gray-900">No Telp</label>
                            <input type="text" id="no_telp_ayah" name="no_telp_ayah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="082282000001" value="{{ old('no_telp_ayah') }}" required />
                        </div>
                    </div>
                    <div id="sticky-banner" tabindex="-1"
                        class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
                        <h1 class="text-xl font-semibold text-gray-900">Data Orang Tua (Ibu)</h1>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="nik_ibu" class="block mb-2 text-sm font-medium text-gray-900">NIK Ibu</label>
                            <input type="text" id="nik_ibu" name="nik_ibu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="1501161707860001" value="{{ old('nik_ibu') }}" required />
                        </div>
                        <div>
                            <label for="nama_ibu" class="block mb-2 text-sm font-medium text-gray-900">Nama Ibu</label>
                            <input type="text" id="nama_ibu" name="nama_ibu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Dora" value="{{ old('nama_ibu') }}" required />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="pekerjaan_ibu"
                                class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                            <select id="pekerjaan_ibu" name="pekerjaan_ibu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option>-- Pilih --</option>
                                @foreach ($pekerjaan as $item)
                                    <option value="{{ $item }}" @if (old('pekerjaan_ibu') == $item) selected @endif>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="pendidikan_ibu"
                                class="block mb-2 text-sm font-medium text-gray-900">Pendidikan</label>
                            <select id="pendidikan_ibu" name="pendidikan_ibu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option>-- Pilih --</option>
                                @foreach ($pendidikan as $item)
                                    <option value="{{ $item }}" @if (old('pendidikan_ibu') == $item) selected @endif>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-4 md:grid-cols-2 text-left">
                        <div>
                            <label for="no_telp_ibu" class="block mb-2 text-sm font-medium text-gray-900">No Telp</label>
                            <input type="text" id="no_telp_ibu" name="no_telp_ibu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="082282000001" value="{{ old('no_telp_ibu') }}" required />
                        </div>
                    </div>
                    <p
                class="max-w-screen-xl font-bold mb-2 border-b border-t border-gray-200 text-red-500 lg:mb-8 md:text-md lg:text-md text-left">
                Perhatian! Pastikan data yang diinput sudah benar, kesalahan dalam pengisian data menjadi tanggung jawab
                peserta.</p>
                    <div class="flex space-x-1 items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm px-5 py-2.5">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
