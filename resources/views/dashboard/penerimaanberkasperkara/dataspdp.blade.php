<div class="grid gap-6 mb-4 md:grid-cols-2">
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Penyidik</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ $penyidik->nama }}" disabled />
        </div>
    </div>
    <div class="flex"></div>
</div>
<div id="sticky-banner" tabindex="-1"
    class="top-0 start-0 z-50 flex justify-content-end w-full p-4 mb-2 border-b border-gray-200">
    <h1 class="text-xl font-semibold text-gray-900">Identitas Tersangka</h1>
</div>
<div class="grid gap-6 mb-4 md:grid-cols-2">
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Nama Tersangka</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ $tersangka->nama }}" disabled />
        </div>
    </div>
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Alamat</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ $tersangka->alamat }}" disabled />
        </div>
    </div>
</div>
<div class="grid gap-6 mb-4 md:grid-cols-2">
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Tempat Lahir</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ $tersangka->tempat_lahir }}" disabled />
        </div>
    </div>
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Tanggal Lahir</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ Carbon\Carbon::parse($tersangka->tgl_lahir)->format('d-m-Y') }}" disabled />
        </div>
    </div>
</div>
<div class="grid gap-6 mb-4 md:grid-cols-2">
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Jenis Kelamin</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ $tersangka->jekel }}" disabled />
        </div>
    </div>
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Pekerjaan</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ $tersangka->pekerjaan }}" disabled />
        </div>
    </div>
</div>
<div class="grid gap-6 mb-4 md:grid-cols-2">
    <div class="flex">
        <label for="penyidik"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 w-60">Agama</label>
        <div class="relative w-full">
            <input type="text"
                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg rounded-s-gray-100 rounded-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                value="{{ $tersangka->agama }}" disabled />
        </div>
    </div>
</div>
