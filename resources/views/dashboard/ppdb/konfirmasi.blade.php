<div id="popup-delete-{{ $item->id_data_ppdb }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-delete-{{ $item->id_data_ppdb }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Konfirmasi kelulusan peserta PPDB</h3>
                <div class="flex text-center justify-center mx-auto">
                    <form action="{{ route('admin.ppdb.lulus', $item->id_data_ppdb) }}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-green-500 rounded-lg border border-gray-200 hover:bg-green-300 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Lulus</button>
                    </form>
                    <form action="{{ route('admin.ppdb.gagal', $item->id_data_ppdb) }}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-gray-200 hover:bg-red-300 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak Lulus</button>
                    </form>
                    <button data-modal-hide="popup-delete-{{ $item->id_data_ppdb }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
