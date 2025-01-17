<!-- Main modal -->
<div id="popup-edit-{{ $item->id_sidang }}" tabindex="-1" aria-hidden="true"
class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
<div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
    <!-- Modal content -->
    <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
            <h3 class="text-lg font-semibold text-gray-900">
                Update {{ $title }}
            </h3>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-toggle="popup-edit-{{ $item->id_sidang }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form method="post" action="{{ route('admin.sidang.update', $item->id_sidang) }}" autocomplete="off">
            @method('put')
            @csrf
            <div class="flex mb-4">
                <label for="id_perkara"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">No Perkara</label>
                <select id="id_perkara" name="id_perkara"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option selected="">-- Pilih --</option>
                    @foreach ($perkara as $kont)
                        <option value="{{ $kont->id_perkara }}" @if ($item->id_perkara == $kont->id_perkara) selected @endif>{{ $kont->no_perkara }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex mb-4">
                <label for="tgl_sidang"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Tgl
                    Sidang</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" name="tgl_sidang" required type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                        value="{{ Carbon\Carbon::parse($item->tgl_sidang)->format('Y-m-d') }}">
                </div>
            </div>
            <div class="flex mb-4">
                <label for="waktu_mulai"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Waktu Mulai</label>
                <div class="relative w-full">
                    <input type="time"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        id="waktu_mulai" name="waktu_mulai" value="{{ $item->waktu_mulai }}" />
                </div>
            </div>
            <div class="flex mb-4">
                <label for="waktu_selesai"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Waktu Selesai</label>
                <div class="relative w-full">
                    <input type="time"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        id="waktu_selesai" name="waktu_selesai" value="{{ $item->waktu_selesai }}" />
                </div>
            </div>
            <div class="flex mb-4">
                <label for="ruang_sidang"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Ruang Sidang</label>
                <div class="relative w-full">
                    <input type="text"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        id="ruang_sidang" name="ruang_sidang" value="{{ $item->ruang_sidang }}" />
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm px-5 py-2.5">
                Simpan
            </button>
            <button data-modal-hide="popup-edit-{{ $item->id_perkara }}" type="button"
                class="text-white bg-red-700 hover:bg-red-800 font-bold rounded-lg text-sm px-5 py-2.5">
                Batal
            </button>
        </form>
    </div>
</div>
</div>
