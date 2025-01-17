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
                    <img src="/img/tablogo.webp" class="h-8 me-3" alt="FlowBite Logo" />
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
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900" role="none">
                                Neil Sims
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-100"
                                    role="menuitem">Sign out</a>
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
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 hover:font-semibold group {{ Request::is('/') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/*') ? 'border-b border-gray-20' : '' }} "
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
                    aria-expanded="{{ Request::is('admin/master/*') ? 'true' : 'false' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path
                            d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875Z" />
                        <path
                            d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 0 0 1.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 0 0 1.897 1.384C6.809 12.164 9.315 12.75 12 12.75Z" />
                        <path
                            d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 15.914 9.315 16.5 12 16.5Z" />
                        <path
                            d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 19.664 9.315 20.25 12 20.25Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Master</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none"viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="py-2 space-y-2 {{ Request::is('admin/master/*') ? '' : 'hidden' }}">
                    <li>
                        <a href="{{ route('admin.kategori.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/kategori') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Data
                            Kategori</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.hakim.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/hakim') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Data
                            Hakim</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.jaksa.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/master/jaksa') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Data
                            Jaksa</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.perkara.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 hover:font-semibold group {{ Request::is('admin/perkara') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path fill-rule="evenodd"
                            d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM12.75 12a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V18a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V12Z"
                            clip-rule="evenodd" />
                        <path
                            d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
                    </svg>
                    <span class="ms-3">Data Perkara</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.sidang.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 hover:font-semibold group {{ Request::is('admin/sidang') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path fill-rule="evenodd"
                            d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z"
                            clip-rule="evenodd" />
                        <path
                            d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                    </svg>
                    <span class="ms-3">Data Sidang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.catatan.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 hover:font-semibold group {{ Request::is('admin/catatan') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3">Data Catatan Perkara</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/laporan/*') ? 'border-b border-gray-20' : '' }} "
                    aria-controls="dropdown-example-2" data-collapse-toggle="dropdown-example-2"
                    aria-expanded="{{ Request::is('admin/laporan/*') ? 'true' : 'false' }}">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6">
                        <path
                            d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875Z" />
                        <path
                            d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 0 0 1.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 0 0 1.897 1.384C6.809 12.164 9.315 12.75 12 12.75Z" />
                        <path
                            d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 15.914 9.315 16.5 12 16.5Z" />
                        <path
                            d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 0 0 1.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 0 0 1.897 1.384C6.809 19.664 9.315 20.25 12 20.25Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Laporan</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none"viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example-2" class="py-2 space-y-2 {{ Request::is('admin/laporan/*') ? '' : 'hidden' }}">
                    <li>
                        <a href="{{ route('admin.perkara.laporan') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/laporan/perkara') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Laporan Perkara</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sidang.laporan') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/laporan/sidang') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Laporan Sidang</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.catatan.laporan') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-blue-100 hover:font-semibold {{ Request::is('admin/laporan/catatan') ? 'text-green-800 border border-green-300 rounded-lg bg-green-100' : '' }}">Laporan Catatan Perkara</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
