@extends('layouts.admin')

@section('container')
    <div id="sticky-banner" tabindex="-1" class="top-0 start-0 z-50 flex justify-between w-full p-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
    </div>

    <form method="GET" action="{{ route('admin.catatan.laporan') }}">
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input datepicker datepicker-autohide datepicker-autoselect-today datepicker-format="yyyy-mm-dd" name="bln"
                value="{{ Carbon\Carbon::parse($bln)->format('Y-m-d') }}" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                placeholder="Pilih Tanggal">
        </div>
        <div class="flex space-x-1">
            <button type="submit"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mt-2 mb-4">
                Cari Data
            </button>
            <a href="{{ route('admin.catatan.print', ['bln' => Carbon\Carbon::parse($bln)->format('Y-m-d')]) }}"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mt-2 mb-4">
                Cetak Laporan
            </a>
        </div>
    </form>


    @if (session('toast_success'))
        <div id="alertDialog"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-green-100 rounded-lg shadow fixed bottom-5 right-5"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('toast_success') }}</div>
        </div>
    @endif

    <table class="mt-2 w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Perkara
                </th>
                <th scope="col" class="px-6 py-3">
                    Jaksa Pembuat Catatan
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Catatan
                </th>
                <th scope="col" class="px-6 py-3">
                    Isi Catatan
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perkara as $item)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->no_perkara }}
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $a = App\Models\ModelJaksa::where('id_jaksa', $item->id_jaksa)->first();
                        @endphp
                        {{ $a->nama_jaksa }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Carbon\Carbon::parse($item->tgl_catatan)->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->isi_catatan }}
                    </td>
                </tr>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
