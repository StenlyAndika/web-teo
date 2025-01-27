@extends('layouts.admin')

@section('container')
    <div id="sticky-banner" tabindex="-1"
        class="top-0 mb-4 start-0 z-50 flex justify-between w-full p-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
    </div>

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

    <table id="search-table" class="mt-2 w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor dan Tanggal Berkas
                </th>
                <th scope="col" class="px-6 py-3">
                    Tersangka
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Opsi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimaanberkastahap1 as $item)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}-
                        {{ $item->id_penerimaan_spdp }}
                    </th>
                    <td class="px-6 py-4">
                        @php
                            $a = App\Models\ModelPenerimaanSPDP::where(
                                'id_penerimaan_spdp',
                                $item->id_penerimaan_spdp,
                            )->first();
                        @endphp
                        {{ $a->no_spdp }} Tgl Berkas : {{ Carbon\Carbon::parse($item->tgl_spdp)->format('d-m-Y') }}<br>
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $ab = App\Models\ModelTersangka::where(
                                'id_penerimaan_spdp',
                                $item->id_penerimaan_spdp,
                            )->first();
                        @endphp
                        {{ $ab->nama }}<br>
                    </td>
                    @php
                        $status = App\Models\ModelPelimpahan::where(
                            'id_penerimaan_spdp',
                            $item->id_penerimaan_spdp,
                        )->first();
                    @endphp
                    <td class="px-6 py-4">
                        @if (empty($status))
                            <p class="p-2 text-green-800 border border-green-300 rounded-lg bg-green-100">Draft</p>
                        @else
                            <p class="p-2 text-blue-800 border border-blue-300 rounded-lg bg-blue-100">Dilimpahkan</p>
                        @endif
                    </td>
                    <td class="flex justify-start space-x-2">
                        @if (empty($status))
                            <button data-modal-target="popup-pelimpahan-{{ $item->id_penerimaan_spdp }}"
                                data-modal-toggle="popup-pelimpahan-{{ $item->id_penerimaan_spdp }}"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center"
                                type="button">
                                Pelimpahan
                            </button>
                            @include('dashboard.pelimpahan.show')
                        @else
                            <button data-modal-target="popup-delete-{{ $item->id_penerimaan_spdp }}"
                                data-modal-toggle="popup-delete-{{ $item->id_penerimaan_spdp }}"
                                class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center"
                                type="button">
                                Hapus
                            </button>
                            @include('dashboard.pelimpahan.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
