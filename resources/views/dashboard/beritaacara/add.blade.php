@extends('layouts.admin')

@section('container')
    @include('dashboard.beritaacara.penuntut')
    <div id="sticky-banner" tabindex="-1"
        class="top-0 start-0 z-50 flex justify-content-end w-full p-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
    </div>
    <div class="mt-2">
        <div class="grid gap-6 mb-4 md:grid-cols-2">
            <div class="flex">
                <label for="no_spdp_cari"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                    No SPDP</label>
                <select id="no_spdp_cari"
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <option selected>-- Pilih --</option>
                    @foreach ($penerimaanspdp as $spdp)
                        <option value="{{ $spdp->id_penerimaan_spdp }}">{{ $spdp->no_spdp }}</option>
                    @endforeach
                </select>
                <div class="flex"></div>
            </div>
        </div>
        <div class="spdp-container"></div>
        <div id="sticky-banner" tabindex="-1"
            class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
            <h1 class="text-xl font-semibold text-gray-900">Identitas Jaksa</h1>
        </div>
        <form method="post" action="{{ route('admin.beritaacara.store') }}" autocomplete="off">
            @csrf
            <input type="hidden" id="id_penerimaan_spdp" name="id_penerimaan_spdp" value="">
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="no_p31"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        No Surat P-31</label>
                    <div class="relative w-full">
                        <input type="text" id="no_p31" name="no_p31"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('no_p31') }}" />
                    </div>
                </div>
                <div class="flex">
                    <label for="jenis_tahanan"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        Jenis Tahanan</label>
                    <div class="flex w-full">
                        <select id="jenis_tahanan" name="jenis_tahanan"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>-- Pilih --</option>
                            <option value="Rutan">Rutan</option>
                            <option value="Rumah">Rumah</option>
                            <option value="Kota">Kota</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="tgl_penahanan_dari"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        Penahanan dari tanggal</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_penahanan_dari" value="{{ old('tgl_penahanan_dari') }}" required>
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
                <div class="flex">
                    <label for="tgl_penahanan_hingga"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        Penahanan hingga tanggal</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_penahanan_hingga" value="{{ old('tgl_penahanan_hingga') }}" required>
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
            <div class="grid gap-6 mb-4 md:grid-cols-2">
                <div class="flex">
                    <label for="lokasi_penahanan"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">*
                        Lokasi Penahanan</label>
                    <div class="relative w-full">
                        <input type="text" id="lokasi_penahanan" name="lokasi_penahanan"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('lokasi_penahanan') }}" />
                    </div>
                </div>
            </div>
            <div class="flex space-x-1 items-center pb-4 pt-4 mt-4 mb-4 rounded-t border-b border-t sm:mb-5">
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
