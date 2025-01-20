@extends('layouts.admin')

@section('container')
    @include('dashboard.penerimaanspdp.tersangka')
    <div id="sticky-banner" tabindex="-1"
        class="top-0 start-0 z-50 flex justify-content-end w-full p-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
        <h5 class="text-gray-500">&nbsp;Surat {{ $subtitle }}</h5>
    </div>
    <div class="mt-2">
        <form method="post" action="{{ route('admin.penspdp.store') }}" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="id_instansi_penyidik"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Instansi
                        Penyidik</label>
                    <select id="id_instansi_penyidik" name="id_instansi_penyidik"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        @foreach ($instansipenyidik as $ipen)
                            <option value="{{ $ipen->id_instansi_penyidik }}">{{ $ipen->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex">
                    <label for="id_instansi_pelaksana"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Instansi
                        Pelaksana</label>
                    <select id="id_instansi_pelaksana" name="id_instansi_pelaksana"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        @foreach ($instansipelaksana as $ipel)
                            <option value="{{ $ipel->id_instansi_pelaksana }}">{{ $ipel->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="no_sprindik"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Nomor
                        Sprindik</label>
                    <div class="relative w-full">
                        <input type="text"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="no_sprindik" name="no_sprindik" value="{{ old('no_sprindik') }}" required />
                    </div>
                </div>
                <div class="flex">
                    <label for="tgl_sprindik"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Tanggal
                        Sprindik</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_sprindik" value="{{ old('tgl_sprindik') }}" required>
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="no_spdp"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Nomor
                        SPDP</label>
                    <div class="relative w-full">
                        <input type="text"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="no_spdp" name="no_spdp" value="{{ old('no_spdp') }}" required />
                    </div>
                </div>
                <div class="flex">
                    <label for="tgl_spdp"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Tanggal
                        SPDP</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_spdp" value="{{ old('tgl_spdp') }}" required>
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="diterima_wilayah_kerja"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Diterima
                        Wilayah Kerja</label>
                    <div class="relative w-full">
                        <input type="hidden" name="diterima_wilayah_kerja" value="KEJAKSAAN AGUNG REPUBLIK INDONESIA">
                        <input type="text"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            value="KEJAKSAAN AGUNG REPUBLIK INDONESIA" readonly />
                    </div>
                </div>
                <div class="flex">
                    <label for="tgl_diterima"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Tanggal
                        Diterima</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_diterima" value="{{ old('tgl_diterima') }}" required>
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="waktu_kejadian"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Waktu
                        Kejadian Perkara</label>
                    <div class="flex w-full">
                        <input type="time"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="waktu_kejadian" name="waktu_kejadian" value="{{ old('waktu_kejadian') }}" required />
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="flex">
                    <label for="tgl_kejadian"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Tanggal
                        Kejadian Perkara</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_kejadian" value="{{ old('tgl_kejadian') }}" required>
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="w-full border border-gray-200 rounded-lg bg-gray-50">
                    <div class="flex items-center justify-between px-3 py-2 border-b bg-gray-100">
                        <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                                <p class="text-gray-900">Tempat Kejadian Perkara</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                        <label for="tempat_kejadian_perkara" class="sr-only">Publish post</label>
                        <textarea id="tempat_kejadian_perkara" rows="4"
                            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0"
                            name="tempat_kejadian_perkara" placeholder="..." required>{{ old('tempat_kejadian_perkara') }}</textarea>
                    </div>
                </div>
                <div class="w-full border border-gray-200 rounded-lg bg-gray-50">
                    <div class="flex items-center justify-between px-3 py-2 border-b bg-gray-100">
                        <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                                <p class="text-gray-900">Uraian Singkat Perkara</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                        <label for="uraian_singkat_perkara" class="sr-only">Publish post</label>
                        <textarea id="uraian_singkat_perkara" rows="4"
                            class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0"
                            name="uraian_singkat_perkara" placeholder="..." required>{{ old('uraian_singkat_perkara') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50">
                <div class="flex items-center justify-between px-3 py-2 border-b bg-gray-100">
                    <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                            <p class="text-gray-900">Undang-undang & Pasal</p>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                    <label for="undang_undang_dan_pasal" class="sr-only">Publish post</label>
                    <textarea id="undang_undang_dan_pasal" rows="4"
                        class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0"
                        name="undang_undang_dan_pasal" placeholder="..." required>{{ old('undang_undang_dan_pasal') }}</textarea>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="jenis_pidana"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Jenis
                        Pidana</label>
                    <select id="jenis_pidana" name="jenis_pidana"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        @foreach ($jenispidana as $jepid)
                            <option value="{{ $jepid }}">{{ $jepid }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex space-x-2">
                    <button data-modal-target="default-modal-tersangka" data-modal-toggle="default-modal-tersangka"
                        class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button">
                        Tambah Tersangka
                    </button>
                    <div id="tersangkaContainer">
                        @if (session('temp_tersangka.nama'))
                            <button
                                class="block flex text-blue-800 border border-blue-300 rounded-lg bg-blue-100 font-semibold text-sm px-5 py-2.5 text-center">
                                Data tersangka sudah diisi&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @else
                            <button
                                class="block flex text-red-800 border border-red-300 rounded-lg bg-red-100 font-semibold text-sm px-5 py-2.5 text-center">
                                Data tersangka belum diisi&nbsp;
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="jenis_perkara"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Jenis
                        Perkara</label>
                    <select id="jenis_perkara" name="jenis_perkara"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        @foreach ($jenisperkara as $jeper)
                            <option value="{{ $jeper }}">{{ $jeper }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex">
                    <label for="berkas_spdp"
                        class="flex-shrink-0 z-10 inline-flex items-center px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Unggah
                        SPDP</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-e-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="berkas_spdp" type="file" name="berkas_spdp" required>
                </div>
            </div>
            <div class="flex space-x-1">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm px-5 py-2.5">
                    Simpan
                </button>
                <a href="{{ route('admin.penspdp.index') }}"
                    class="text-white bg-red-700 hover:bg-red-800 font-bold rounded-lg text-sm px-5 py-2.5">Batal</a>
            </div>
        </form>
    </div>
@endsection
