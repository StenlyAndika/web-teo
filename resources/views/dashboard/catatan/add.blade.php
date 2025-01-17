<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah {{ $title }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="default-modal">
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
            <form method="post" action="{{ route('admin.catatan.store') }}" autocomplete="off">
                @method('post')
                @csrf
                <div class="flex mb-4">
                    <label for="id_perkara"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">No Perkara</label>
                    <select id="id_perkara" name="id_perkara"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected="">-- Pilih --</option>
                        @foreach ($perkara as $item)
                            <option value="{{ $item->id_perkara }}">{{ $item->no_perkara }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex mb-4">
                    <label for="id_jaksa"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Jaksa Pembuat Catatan</label>
                    <select id="id_jaksa" name="id_jaksa"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected="">-- Pilih --</option>
                        @foreach ($jaksa as $kont)
                            <option value="{{ $kont->id_jaksa }}">{{ $kont->nama_jaksa }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex mb-4">
                    <label for="tgl_catatan"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Tgl
                        Catatan</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" name="tgl_catatan" required type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Pilih Tanggal">
                    </div>
                </div>
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-100 dark:bg-gray-700 dark:border-gray-600">
                    <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                        <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                                <label for="isi_catatan">Isi Catatan</label>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                        <label for="editor" class="sr-only">Publish post</label>
                        <textarea id="editor" name="isi_catatan" rows="8" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..." required ></textarea>
                    </div>
                </div>
                <div class="flex space-x-1">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                    <button data-modal-hide="default-modal" type="button"
                        class="text-white bg-red-700 hover:bg-red-800 font-bold rounded-lg text-sm px-5 py-2.5">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
