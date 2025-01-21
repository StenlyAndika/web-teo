<!-- Main modal -->
<div id="default-modal-tersangka" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah Tersangka
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="default-modal-tersangka">
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
            <form method="post" id="form-tersangka" action="{{ route('admin.temptersangka.store') }}" autocomplete="off">
                @csrf
                <div class="flex mb-4">
                    <label for="nama"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Nama
                        Tersangka</label>
                    <div class="relative w-full">
                        <input type="text"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="nama" name="nama" value="{{ session('temp_tersangka.nama') ?? '' }}" />
                    </div>
                </div>
                <div class="flex mb-4">
                    <label for="alamat"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Alamat</label>
                    <div class="relative w-full">
                        <input type="text"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="alamat" name="alamat" value="{{ session('temp_tersangka.alamat') ?? '' }}" />
                    </div>
                </div>
                <div class="flex mb-4">
                    <label for="jekel"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Jenis
                        Kelamin</label>
                    <select id="jekel" name="jekel"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        <option value="Laki-laki" @if (session('temp_tersangka.jekel') == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if (session('temp_tersangka.jekel') == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>
                <div class="flex mb-4">
                    <label for="tempat_lahir"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Tempat
                        Lahir</label>
                    <div class="relative w-full">
                        <input type="tempat_lahir"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="tempat_lahir" name="tempat_lahir"
                            value="{{ session('temp_tersangka.tempat_lahir') ?? '' }}" />
                    </div>
                </div>
                <div class="flex mb-4">
                    <label for="tgl_lahir"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Tgl
                        Lahir</label>
                    <div class="flex w-full">
                        <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="yyyy-mm-dd" name="tgl_lahir"
                            value="{{ session('temp_tersangka.tgl_lahir') ?? '' }}">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="flex mb-4">
                    <label for="agama"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Agama</label>
                    <select id="agama" name="agama"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        @foreach ($agama as $item)
                            <option value="{{ $item }}" @if (session('temp_tersangka.agama') == $item) selected @endif>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex mb-4">
                    <label for="pekerjaan"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Pekerjaan</label>
                    <select id="pekerjaan" name="pekerjaan"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option selected>-- Pilih --</option>
                        @foreach ($pekerjaan as $item2)
                            <option value="{{ $item2 }}" @if (session('temp_tersangka.agama') == $item2) selected @endif>{{ $item2 }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex space-x-1 items-center pb-4 pt-4 mt-4 mb-4 rounded-t border-b border-t sm:mb-5">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm px-5 py-2.5">
                        Simpan
                    </button>
                    <button data-modal-hide="default-modal-tersangka" type="button"
                        class="text-white bg-red-700 hover:bg-red-800 font-bold rounded-lg text-sm px-5 py-2.5">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
