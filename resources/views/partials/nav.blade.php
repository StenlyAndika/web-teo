<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="flex ms-2 md:me-24">
                    <img src="/img/tablogo.png" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Kejari Sungai
                        Penuh</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->is_root == 1 ? '/img/root.png' : '/img/admin.png' }}" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900" role="none">
                                {{ auth()->user()->nama }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-100">Sign out</span></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>



<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 border border-blue-300 rounded-lg hover:bg-blue-100 hover:font-semibold group {{ Request::is('/') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
                    </svg>
                    <span class="ms-3">DASHBOARD</span>
                </a>
            </li>
            <li class="border-b border-gray-200">
                @cannot('root')
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 hover:font-semibold
                    {{ Request::is('admin/master/*') ? 'border-b border-gray-20' : '' }}"
                    aria-controls="dropdown-example6" data-collapse-toggle="dropdown-example6" aria-expanded="{{ Request::is('admin/master/*') ? 'true' : 'false' }}">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Master</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none"viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example6" class="py-1 space-y-1 {{ Request::is('admin/master/*') ? '' : 'hidden' }}">
                    <li>
                        <a href="{{ route('admin.instansipenyidik.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/instansipenyidik') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Data Instansi Penyidik</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.instansipelaksana.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/instansipelaksana') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Data Instansi Pelaksana</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.wilayahpelimpahan.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/wilayahpelimpahan') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Data Wilayah Pelimpahan</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.jaksa.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/jaksa') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Data
                            Jaksa</a>
                    </li>
                </ul>
            </li>
            <li>
                <p class="flex items-center p-2 text-gray-900 border border-blue-300 rounded-lg font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
                    </svg>
                    <span class="ms-3">PRA PENUNTUTAN</span>
                </p>
            </li>
            <li class="border-b border-gray-200">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 hover:font-semibold
                    {{ Request::is('admin/prapen/penspdp*') ? 'border-b border-gray-20' : '' }}"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example" aria-expanded="{{ Request::is('admin/prapen/penspdp*') ? 'true' : 'false' }}">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Penerimaan SPDP</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none"viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="py-1 space-y-1 {{ Request::is('admin/prapen/penspdp*') ? '' : 'hidden' }}">
                    <li>
                        <a href="{{ route('admin.penspdp.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/prapen/penspdp*') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Pemberitahuan
                            Dimulainya Penyidikan</a>
                    </li>
                </ul>
            </li>
            <li class="border-b border-gray-200">
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 hover:font-semibold
                    {{ Request::is('admin/prapen/penbt1*') ? 'border-b border-gray-20' : '' }}"
                    aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2" aria-expanded="{{ Request::is('admin/prapen/penbt1*') ? 'true' : 'false' }}">
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Penerimaan Berkas Tahap
                        I</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none"viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example2" class="py-1 space-y-1 {{ Request::is('admin/prapen/penbt1*') ? '' : 'hidden' }}">
                    <li>
                        <a href="{{ route('admin.penbt1.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/prapen/penbt1*') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Penerimaan
                            Berkas Perkara</a>
                    </li>
                </ul>
            </li>
            <li class="border-b border-gray-200">
                <a href="{{ route('admin.pelimpahan.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/prapen/pelimpahan*') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">
                    <span class="ms-3">Penyelesaian Tahap Pra Penuntutan</span>
                </a>
            </li>
            @endcan
            <li>
                <p class="flex items-center p-2 text-gray-900 border border-blue-300 rounded-lg font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
                    </svg>
                    <span class="ms-3">LAPORAN</span>
                </p>
            </li>
            <li class="border-b border-gray-200">
                <a href="{{ route('admin.laporan.pelimpahan') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/laporan/pelimpahan*') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">
                    <span class="ms-3">Laporan Pelimpahan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
