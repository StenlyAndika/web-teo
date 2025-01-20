@extends('layouts.admin')

@section('container')
    <div id="sticky-banner" tabindex="-1"
        class="top-0 start-0 z-50 flex justify-content-end w-full p-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
    </div>
    <div class="mt-2">
        <form method="post" action="" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="no_p16"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        No Surat P16</label>
                    <div class="relative w-full">
                        <input type="text" id="no_p16" name="no_p16"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('no') }}" />
                    </div>
                </div>
                <div class="flex">
                    <label for="id_instansi_penyidik_cari"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        No SPDP</label>
                    <select id="id_instansi_penyidik_cari" name="id_instansi_penyidik"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        @foreach ($penerimaanspdp as $spdp)
                            <option value="{{ $spdp->id_penerimaan_spdp }}">{{ $spdp->no_spdp }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="tgl_p16"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        Tanggal P16</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_p16" value="{{ old('tgl_p16') }}" required>
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
                <div class="flex space-x-2">
                    <button data-modal-target="default-modal-tersangka" data-modal-toggle="default-modal-tersangka"
                        class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center"
                        type="button">
                        Tambah Jaksa
                    </button>
                    <div id="tersangkaContainer">
                        @if (session('temp_tersangka.nama'))
                            <button
                                class="block flex text-blue-800 border border-blue-300 rounded-lg bg-blue-100 font-semibold text-sm px-5 py-2.5 text-center">
                                Data jaksa sudah dipilih&nbsp;
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
                                Data jaksa belum dipilih&nbsp;
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
            <div class="spdp-container">

            </div>
        </form>
    </div>
@endsection
