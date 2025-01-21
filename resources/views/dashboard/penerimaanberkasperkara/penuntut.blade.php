<!-- Main modal -->
<div id="default-modal-penuntut-umum" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah Jaksa Penuntut Umum
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="default-modal-penuntut-umum">
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
            <form class="mb-4" method="post" id="jaksaFormSubmit" action="{{ route('set_temp_jaksa') }}"
                autocomplete="off">
                @csrf
                <div class="flex">
                    <label for="nama"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-40">Nama
                        Jaksa</label>
                    <div class="flex w-full">
                        <input type="text"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="cari_jaksa" name="nama" value="" />
                        <button type="submit"
                            class="inline-flex items-center px-3 text-blue-900 bg-blue-200 border rounded-s-0 border-s-0 rounded-e-md text-white bg-blue-700 hover:bg-blue-800 font-bold text-sm w-40">
                            Tambah Data
                        </button>
                    </div>
                </div>
                <input type="hidden" id="id_jaksa" name="id_jaksa" value="" />
            </form>
            <table id="default-table" class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nip
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pangkat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="flex space-x-1 items-center pb-4 pt-4 mt-4 mb-4 rounded-t border-b border-t sm:mb-5">
                <button data-modal-hide="default-modal-penuntut-umum" id="submitTempJaksa" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 font-bold rounded-lg text-sm px-5 py-2.5">
                    Simpan dan lanjutkan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('default-modal-penuntut-umum');
        const observer = new MutationObserver(function(mutationsList, observer) {
            for (let mutation of mutationsList) {
                if (mutation.attributeName === 'class') {
                    const isVisible = !modal.classList.contains('hidden');
                    if (isVisible) {
                        updateTable();
                    }
                }
            }
        });

        observer.observe(modal, {
            attributes: true
        });
    });
</script>
