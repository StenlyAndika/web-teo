@extends('layouts.admin')

@section('container')
    <div id="sticky-banner" tabindex="-1"
        class="top-0 start-0 z-50 flex justify-between w-full p-4 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-900">{{ $title }}</h1>
    </div>

    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mt-2 mb-4"
        type="button">
        Data Baru
    </button>

    @include('dashboard.instansipenyidik.add')

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
                    Nama Instansi Penyidik
                </th>
                <th scope="col" class="px-6 py-3">
                    Opsi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instansi as $item)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->nama }}
                    </td>
                    <td class="flex justify-start space-x-2">
                        <button data-modal-target="popup-edit-{{ $item->id_instansi_penyidik }}"
                            data-modal-toggle="popup-edit-{{ $item->id_instansi_penyidik }}"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center"
                            type="button">
                            Edit
                        </button>
                        @include('dashboard.instansipenyidik.show')
                        <button data-modal-target="popup-delete-{{ $item->id_instansi_penyidik }}"
                            data-modal-toggle="popup-delete-{{ $item->id_instansi_penyidik }}"
                            class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center"
                            type="button">
                            Hapus
                        </button>
                        @include('dashboard.instansipenyidik.delete')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
